<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>
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
</head>
<body class="hold-transition lockscreen">

<div class="row">
    <div class="col-sm-3 col-md-offset-3">
        <div class="lockscreen-wrapper" style="margin-top:250px;">     
            <div class="lockscreen-item">
          
              <div class="lockscreen-image" style="margin-left:120px;">
              <img src="{{ asset('image/pop.png') }}" alt="User Image">
              </div>
          
            </div>
            <br><br><br>
          
            <div class="row text-center">
            <a href="{{ route('login') }}" role="button" class="btn bg-navy margin">Masuk untuk Admin</a>
            </div>
         
          </div>
    </div>

    <div class="col-sm-3">
        <div class="lockscreen-wrapper" style="margin-top:250px;">     
            <div class="lockscreen-item">
          
              <div class="lockscreen-image" style="margin-left:120px;">
                <img src="{{ asset('image/pop1.png') }}" alt="User Image">
              </div>
          
            </div>
            <br><br><br>
          
            <div class="row text-center">
            <a href="{{ route('login') }}" role="button" class="btn bg-navy margin">Masuk untuk User Loket</a>
            </div>
         
          </div>
    </div>

</div>


<!-- jQuery 3 -->
<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
