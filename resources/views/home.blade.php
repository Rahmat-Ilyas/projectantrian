@extends('layouts.dashboard')

@section('konten')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Beranda
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-th"></i> Beranda</a></li>
    </ol>
  </section>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="callout callout-success">
          <h4>Selamat Datang <b><i><u>{{ Auth::user()->name }}</u></i></b> </h4>

          <p>Anda Login sebagai <b>Administrator</b>.</p>
        </div>
      </div>
    </div>
  </div>

  <section class="content">

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-archive"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Loket</span>
            <span class="info-box-number loket">0</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-fw fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">User</span>
            <span class="info-box-number userX">0</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Antrian</span>
            <span class="info-box-number antrian">0</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-fw fa-calendar-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Administrator</span>
            <span class="info-box-number"> {{ date("d F Y") }} </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <br>
    <div class="row">
      <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-white">
            <p class="text-muted" style="font-size: 15px; text-align:center;">Jumlah Antrian Pengunjung Hari Ini</p>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a href="#"><i class="fa fa-fw fa-archive"></i> &nbsp; Meja 1 <span class="pull-right badge bg-blue meja1">0</span></a></li>
              <li><a href="#"><i class="fa fa-fw fa-archive"></i> &nbsp; Meja 2 <span class="pull-right badge bg-aqua meja2">0</span></a></li>
              <li><a href="#"><i class="fa fa-fw fa-archive"></i> &nbsp; Meja 3 <span class="pull-right badge bg-green meja3">0</span></a></li>
              <li><a href="#"><i class="fa fa-fw fa-archive"></i> &nbsp; Meja 4 <span class="pull-right badge bg-red meja4">0</span></a></li>
              <li><a href="#"><i class="fa fa-fw fa-archive"></i> &nbsp; Meja 5 <span class="pull-right badge bg-yellow meja5">0</span></a></li>
              <li><a href="#"><i class="fa fa-fw fa-archive"></i> &nbsp; Meja 6 <span class="pull-right badge bg-dark meja6">0</span></a></li>
            </ul>
          </div>
        </div>

      </div>

      <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-body">
            <center><img src="{{ asset('image/logo.png') }}" style="width: 100px;"></center>
            <div class="row" style="margin-top:10px;">
              <center><p><b>Kantor Imigrasi Kelas III Non TPI Palopo</b></p></center>
            </div>
            <hr>
            <ul style="list-style: none">
              <li><i class="fa fa-fw fa-map-marker"></i> &nbsp; Jl. Patang II No.2, Tomarundung, Wara Bar., Kota Palopo, Sulawesi Selatan</li>
              <li><i class="fa fa-fw fa-phone-square"></i> &nbsp; 086587678678</li>
              <li><i class="fa fa-fw fa-envelope"></i> &nbsp; admin@gmail.com</li>
            </ul>
          </div>
        </div>
      </div>

    </div> 

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<input type="hidden" id="url" value="{{ url('/admin-config') }}">

@endsection
