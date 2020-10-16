@extends('layouts.dashboard')
@section('konten')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Display
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Display</a></li>
            <li class="active">Index Display</li>
          </ol>
      </section>
    

      
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
              
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Display</h3>
              </div>
              <div id="routeRedirectLink">
                <a href="{{ route('display.index') }}"></a>
              </div>

              <div class="box-body">
              

                <div class="row">
                  <div class="col-md-9">

                    <div class="box box-success">
                      <div class="box-body">
                        <center><img class="img-responsive" src="{{ asset('assets/dist/img/perangkat.jpg') }}" alt="User profile picture" style="width:190px;"></center>
          
                        <h3 class="profile-username text-center">Kelola Monitor Antrian</h3>
            
                        <br>
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Item</th>
                                    <th>Aksi</th>  
                                  </tr>  
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Tampilkan Diplay</td>
                                  <td><a href="{{ route('display.office') }}" role="button" class="btn btn-primary playss">Link</a>
                                  </td>
                                  </tr>
                                  <tr>
                                    <td>Ganti Video</td>
                                  <td>
                                    <a href="{{ route('video.form') }}" title="Form Upload Video" role="button" class="btn btn-default modalShowVideo"><i class="fa fa-fw fa-eye"></i> View Form</a> &nbsp;
                                    <small class="label bg-yellow"><i class="fa fa-fw fa-file-video-o"></i> {{ $video->nama }}</small>

                                  </td>
                                  </tr>
                                  <tr>
                                    <td>Ubah Teks</td>
                                    <td>
                                    
                                    <form id="formTeksJalan" action="{{ route('teks.jalan') }}" accept-charset="UTF-8" method="POST">
                                      @csrf
                                        <textarea name="isi" class="form-control" cols="20" rows="5"> {{ $teksJalan->isi }} </textarea>
                                      </form>

                                      <button type="button" class="btn btn-success btn-xs simpanTeksJalan" style="margin-top:5px;">Simpan</button>

                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                  

                      </div>
                      <!-- /.box-body -->
                    </div>

                  </div>
                  <div class="col-md-3">
                    <div class="box box-info">
                      <div class="box-body box-profile">
                      <img class="img-responsive" src="{{ asset('assets/dist/img/rev.png') }}" alt="User profile picture" style="width: 190px;">
          
                        <h3 class="profile-username text-center">Info Perangkat</h3>
          
                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                          <b>Ip Address</b> <a class="pull-right">{{ $getip }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Browser</b> <a class="pull-right">{{$getbrowser}}</a>
                           </li>
                          <li class="list-group-item">
                          <b>Device</b> <a class="pull-right">{{ $getdevice }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Operation System</b> <a class="pull-right">{{ $getos }}</a>
                            </li>
                        </ul>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </section>

</div>

@endsection
@push('scripts')
    <script>
      $('.playss').click(function (event) {
        event.preventDefault();
            var url = $(this).attr('href');

            var params = [
              'height='+screen.height,
              'width='+screen.width,
              'fullscreen=yes' // only works in IE, but here for completeness
          ].join(',');

          var popup =   window.open(url,"tess Window", params);
          popup.moveTo(0,0);
            
      })
    </script>
@endpush


