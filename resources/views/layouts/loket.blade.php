<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Antrian Imigrasi Kelas II Palopo</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    @php
    use App\loket;
    $gets = Auth::guard('userLoket')->user()->loket_id;
    $loket = Loket::where('gets', $gets)->first();
    $layanan = $loket->layanan;
    @endphp
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{{ $layanan }}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Loket</b> {{ $layanan }}</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('image/fotoUser/'.Auth::guard('userLoket')->user()->foto) }}" class="user-image" alt="User Image">
                <span class="hidden-xs"> {{Auth::guard('userLoket')->user()->name}} </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{ asset('image/fotoUser/'.Auth::guard('userLoket')->user()->foto) }}" class="img-circle" alt="User Image">

                  <p>
                   {{  Auth::guard('userLoket')->user()->name }}
                    <small>TimeStamp</small>
                  </p>
                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ url('/logouts') }}" class="btn btn-default btn-flat">Sign out</a>

                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('image/fotoUser/'.Auth::guard('userLoket')->user()->foto) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::guard('userLoket')->user()->name}} </p>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU UTAMA</li>

          <li>
            <a href="{{ url('userLoket') }}">
              <i class="fa fa-fw fa-tv"></i> <span>Antrian</span>
            </a>
          </li>



        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    @yield('kontens')
    @include('layouts.modal')

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Kantor Imigrasi Kelas III Non TPI Palopo 2020 .</strong>
    </footer>


    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

  <!-- SlimScroll -->
  <script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
  <script src="{{ asset('js/sweetalert2/sweetalert2.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree()
    })

  </script>
  @stack('scripts')
</body>
</html>
