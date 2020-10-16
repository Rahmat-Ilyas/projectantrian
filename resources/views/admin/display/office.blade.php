<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>View Display</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
<body class="hold-transition lockscreen">

  @php
  function tgl_indo($tanggal){
    $bulan  = array(
      1 => 'January',
      'February',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );

    $pecahkan = explode('-',$tanggal);

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];

  }
  @endphp

  <a href="{{ route('display.time') }}" id="urlDisplayTime"></a>
  <div id="fullscreenxs"  style="background: #d2d6de;">
    <div class="row" id="headerss">
      <div class="col-md-1" style="margin-left:20px;">
        <img src="{{ asset('image/logo.png') }}" style="width:150px; padding:15px;" >
      </div>
      <div class="col-md-8" style="margin-left:50px;">
        <h3>Kantor Imigrasi Kelas III Non TPI Palopo</h3>
        <p>Jl. Patang II No.2, Tomarundung, Wara Bar., Kota Palopo, Sulawesi Selatan 91913</p>
        <p><b>Telp</b> 08163746374</p>
      </div>

      <div class="col-md-2" >
        <h1 id="timestamp">01:09:29</h1>
        <p style="font-size:20px;">{{ tgl_indo(date('Y-m-d')) }}</p>
      </div>

    </div>
    <br>

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6">


          <div class="boxNumber">
            <p style="font-size:145px; text-align:center;" id="calling">0-000</p>

          </div>

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 id="boxAntrian">MEJA <span class="loket">1</span></h3>

            </div>
        {{-- <div class="box-body">
          The body of the box
        </div>

        <div class="box-footer">
          The footer of the box
        </div> --}}

      </div>
    </div>
    <audio id="trigerAudio" autoplay muted="muted" hidden="hidden" controls>
      <source src="/assets/voice/meja/1.mp3" type="mp3">
    </audio>
    <div class="col-md-6">


      <video id="myVideo" width="100%" autoplay loop="loop" controls>
        <source src="{{ asset('video/'.$video->nama) }}" type="video/mp4">
      </video>

      </div>

    </div>
    <br>
    <div class="row">
      <div class="col-lg-2" >
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3 class="text-center loket1" style="font-size:50px;">-</h3>
          </div>
          <a href="#" class="small-box-footer" style="padding: 5px; font-size:30px; pointer-events: none; color: #fff;">Meja 1 - WNI</a>
        </div>
      </div>

      <div class="col-lg-2">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3 class="text-center loket2" style="font-size:50px;">-</h3>
          </div>
          <a href="#" class="small-box-footer" style="padding: 5px; font-size:30px; pointer-events: none; color: #fff;">Meja 2 - WNI</a>
        </div>
      </div>

      <div class="col-lg-2">
        <!-- small box -->
        <div class="small-box bg-navy">
          <div class="inner">
            <h3 class="text-center loket3" style="font-size:50px;">-</h3>
          </div>
          <a href="#" class="small-box-footer" style="padding: 5px; font-size:30px; pointer-events: none; color: #fff;">Meja 3 - WNI</a>
        </div>
      </div>

      <div class="col-lg-2" >
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3 class="text-center loket4" style="font-size:50px;">-</h3>
          </div>
          <a href="#" class="small-box-footer" style="padding: 5px; font-size:30px; pointer-events: none; color: #fff;">Meja 4 - WNA</a>
        </div>
      </div>

      <div class="col-lg-2">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3 class="text-center loket5" style="font-size:50px;">-</h3>
          </div>
          <a href="#" class="small-box-footer" style="padding: 5px; font-size:30px; pointer-events: none; color: #fff;">Meja 5 - WNA</a>
        </div>
      </div>

      <div class="col-lg-2" >
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3 class="text-center loket6" style="font-size:50px;">-</h3>
          </div>
          <a href="#" class="small-box-footer" style="padding: 5px; font-size:30px; pointer-events: none; color: #fff;">Meja 6 - BAP</a>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="jalan">
        <marquee scrollamount="8">{{ $teksJalan->isi }}</marquee>
      </div>
    </div>

  </div>

</div>
<input type="hidden" id="url" value="{{ url('/display-config') }}">

<!-- jQuery 3 -->
<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('fullpage/release/jquery.fullscreen.min.js') }}"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
{{-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=hmZQmkgc"></script> --}}
<script src="{{ asset('js/display.js') }}"></script>
<script>

  $(document).ready(function () {

    $('#myVideo').prop("volume", 0.3);

    get_time();
    function get_time() {
      setTimeout(function() {
        var getTime = new Date();

        var hours = getTime.getHours();
        var minutes = getTime.getMinutes();
        var seconds = getTime.getSeconds();

        function sprintf(val) {
          var toString = val.toString();
          if (toString.length == 1) return '0'+toString;
          else return toString; 
        }

        var time = sprintf(hours) + ":" + sprintf(minutes) + ":" + sprintf(seconds);
        $('#timestamp').text(time);
        get_time();
      }, 1000);
    }

    var timestamp = new Date().getTime()/1000;

    swal({
      title: 'Tekan Yes Untuk Mode FullScreen Monitor',
      imageUrl: 'https://unsplash.it/400/200',
      imageWidth: 200,
      imageHeight: 100,
      imageAlt: 'Custom image',
      showCancelButton : true,
      confirmButtonColor : '#3085d6',
      cancelButtonColor : '#d33',
      confirmButtonText : 'Yes'

    }).then((result) => {
      if (result.value) {
        openFullscreen();
      }
    });

    function openFullscreen() {
      var elem = document.getElementById("fullscreenxs");
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.mozRequestFullScreen) { /* Firefox */
        elem.mozRequestFullScreen();
      } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE/Edge */
        elem.msRequestFullscreen();
      }
    }

    // $('.loket1').click(function() {
    //     var logBackup = console.log;
    //     var logMessages = [];

    //       logMessages.push.apply(logMessages, arguments);
    //       logBackup.apply(console, arguments);
        // console.log = function() {
        // }

        // console.log(logBackup);
        // $.each(logMessages, function(i, dta) {
        //     alert(logMessages[1])
        // });
    // });

  })

</script>
</body>
</html>