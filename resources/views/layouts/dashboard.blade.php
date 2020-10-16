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
  <style>
   #headerss{
    background: #e9ecf2;

    box-shadow: 0 8px 8px -9px black;
  }

  #boxAntrian{
    font-size: 60px;
    text-align: center;
  }

  .boxNumber{
    padding: 15px;
    background: #525459;
    color: #ffffff;
  }

  .jalan{
    padding: 12px;
    background: #4a4c4f;
    color: #ffffff;
    font-size: 15px;
  }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
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
                <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::guard('users')->user()->name }} </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    {{  Auth::guard('users')->user()->name }}  - Admin
                    <small>TimeStamp</small>
                  </p>
                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ url('/logouts') }}"
                    class="btn btn-default btn-flat">Sign out</a>

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
            <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p> {{  Auth::guard('users')->user()->name }} </p>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU UTAMA</li>


          <li class="active">
            <a href="{{ url('/home') }}">
              <i class="fa fa-th"></i> <span>Beranda</span>
            </a>
          </li>

          <li class="header">NAVIGATION</li>

          <li>
            <a href="{{ route('display.index') }}">
              <i class="fa fa-fw fa-tv"></i> <span>Display</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('userloket.index') }}"><i class="fa fa-fw fa-users"></i> Manajemen User</a></li>
              <li><a href="{{ route('loket.index') }}"><i class="fa fa-fw fa-th-list"></i> Kelola Loket</a></li>
              <li><a href="{{ route('antrian.index') }}"><i class="fa fa-fw fa-sort-numeric-asc"></i> Data Antrian</a></li>
            </ul>
          </li>
          <li>
            <a href="#" id="reset">
              <i class="fa fa-fw fa-refresh"></i> <span>Reset Antrian</span>
            </a>
          </li>



        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    @yield('konten')
    @include('layouts.modal')

    <div id="loader" style="display: none;position: relative; bottom:400px; left:600px; z-index:1080">
      <img src="{{ asset('video/tenor.gif') }}">
    </div>


    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Kantor Imigrasi Kelas III Non TPI Palopo 2020 .</strong>
    </footer>


    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <!-- jQuery 3 -->
  <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
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
  <script src="{{ asset('fullpage/release/jquery.fullscreen.min.js') }}"></script>
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree();
    })

  </script>
  @stack('scripts')
</body>
</html>
