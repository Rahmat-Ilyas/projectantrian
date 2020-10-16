@extends('layouts.loket')
@section('kontens')
@php
use App\loket;
$gets = Auth::guard('userLoket')->user()->loket_id;
$loket = Loket::where('gets', $gets)->first();
$loket_id = $loket->id;
$layanan = $loket->layanan;
$nama_loket = $loket->nama_loket;
@endphp
<div class="content-wrapper">

  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="callout callout-success">
          <h4>Selamat Datang <b><i><u>{{Auth::guard('userLoket')->user()->name}}</u></i></b> </h4>

          <p>Anda Login sebagai Pegawai Loket <b> {{ $nama_loket }}</b>.</p>
        </div>
      </div>
    </div>
  </div>

  <section class="content">

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Antrian</span>
            <span class="info-box-number" id="jum-antr">-</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-fw fa-check-square"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Antrian Sekarang</span>
            <span class="info-box-number" id="antr-skrg">-</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-user-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Antrian Selanjutnya</span>
            <span class="info-box-number" id="antr-next">-</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-fw fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Sisa Antrian</span>
            <span class="info-box-number" id="sisa-antr">-</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="info-box">
          <div class="row">
            <center><h1 style="font-size:100px" id="this-view">0-000</h1></center>
          </div>
          <hr>
          <div class="row" style="margin-top:20px; padding-bottom: 20px;">
            <div class="col-md-12 text-center">
              <div hidden="" id="start">
                <button type="button" class="btn bg-aqua margin btn-lg btn-start"><i class="fa fa-fw fa-desktop"></i> Mulai Panggilan</button> 
              </div>
              <div hidden="" id="call">
                <button type="button" class="btn bg-yellow margin btn-lg btn-pause"><i class="fa fa-fw fa-pause-circle-o"></i> Jeda</button>
                <button type="button" class="btn btn-success margin btn-lg btn-call"><i class="fa fa-fw fa-microphone"></i> Panggil</button>
                <div class="text-center m-t-10">
                  <span class="text-aqua" id="status"></span>
                </div>
              </div>
              <div hidden="" id="action">
                <button type="button" class="btn bg-navy margin btn-lg btn-next"><i class="fa fa-fw fa-mail-forward"></i> Next</button>
                <button type="button" class="btn bg-purple margin btn-lg btn-recall"><i class="fa fa-fw fa-microphone"></i> Recall</button>
                <button type="button" class="btn bg-maroon margin btn-lg btn-modal-skip" data-toggle="modal" data-target=".modal-skip"><i class="fa fa-fw fa-sign-out"></i> Skip</button>
                <div class="col-md-12 m-t-10 info" hidden="">
                  <span class="text-aqua">Antrian selanjutnya akan dimuat dalam <b id="setTime">5</b> detik...</span><br>
                  <span><a href="" class="text-success nextSt">Next</a> | <a href="" class="text-danger batalSt">Batal</a></span>
                </div>
                <div class="col-md-12 m-t-10 info-recall" hidden="">
                  <span class="text-aqua">Sedang di panggil ulang</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal modal-skip" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="staticModalLabel">Skip Antrian</h2>
          </div>
          <div class="modal-body">
            <p>Yakin ingin melangkai antrian "<b id="kd-skip">B-001</b>"?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-navy" data-dismiss="modal"><i class="fa fa-fw fa-times-circle-o"></i> Batal</button>
            <button type="button" class="btn bg-maroon btn-skip"><i class="fa fa-fw fa-sign-out"></i> Skip</button>
          </div>
        </div>
      </div>
    </div>

    <input type="hidden" id="url" value="{{ url('/get-data') }}">
    <input type="hidden" id="loket_id" value="{{ $loket_id }}">
    <input type="hidden" id="layanan" value="{{ $layanan }}">
    <input type="hidden" id="get-id">

        {{-- <div class="row">
         
                <div class="col-sm-3">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="info-box bg-aqua">
                          <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
              
                          <div class="info-box-content">
                            <span class="info-box-text">Bookmarks</span>
                            <span class="info-box-number">41,410</span>
              
                            <div class="progress">
                              <div class="progress-bar" style="width: 70%"></div>
                            </div>
                                <span class="progress-description">
                                  70% Increase in 30 Days
                                </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                </div>
                
                <div class="col-md-9">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-fw fa-users"></i> Panggil Antrian</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                <th>Nomor Antrian</th>
                                <th>Loket</th>
                                <th>Aksi</th>
                              </tr>
                          </thead>
                            <tbody>
                            <tr>
                                <td>A001</td>
                                <td>Fwni1</td>
                                <td>
                                    <button type="button" class="btn bg-purple margin btn-xs"><i class="fa fa-fw fa-microphone"></i> Call</button>
                                    <button type="button" class="btn bg-navy margin btn-xs"><i class="fa fa-fw fa-mail-forward"></i> Next</button>
                                    <button type="button" class="btn bg-maroon margin btn-xs"><i class="fa fa-fw fa-sign-out"></i> Skip</button>
                                </td>
                          </tr>
                          <tr>
                            <td>A002</td>
                            <td>Fwni1</td>
                            <td>
                                <button type="button" class="btn bg-purple margin btn-xs"><i class="fa fa-fw fa-microphone"></i> Call</button>
                                <button type="button" class="btn bg-navy margin btn-xs"><i class="fa fa-fw fa-mail-forward"></i> Next</button>
                                <button type="button" class="btn bg-maroon margin btn-xs"><i class="fa fa-fw fa-sign-out"></i> Skip</button>
                            </td>
                      </tr>
                
                         
                        </tbody>
                    </table>
                      </div>
               
                    </div>
                 
                  </div>
     
      
                </div> --}}




              </section>

            </div>
            @endsection