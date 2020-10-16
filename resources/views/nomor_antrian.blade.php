<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
	<meta name="author" content="Coderthemes">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="shortcut icon" href="{{ asset('assets/images/favicon_1.ico') }}">

	<title>Ambil Nomor Antrian</title>

	<link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">


	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="fixed-left">
	<div id="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-4">
					<div class="callout callout-success">
						<div class="panel-heading">
							<h3 class="panel-title">WNI</h3>
						</div>
						<div class="panel-body text-center">
							<button type="button" data-layanan="umum" class="btn-layanan btn btn-xl btn-warning waves-effect waves-light">Umum</button>
							<button type="button" data-layanan="prioritas" class="btn-layanan btn btn-xl btn-primary waves-effect waves-light">Prioritas</button>
							<button type="button" data-layanan="bap" class="btn-layanan btn btn-xl btn-danger waves-effect waves-light">BAP</button>
						</div>
					</div>
				</div>
				<div class="col-lg-2">
					<div class="callout callout-success">
						<div class="panel-heading">
							<h3 class="panel-title">WNA</h3>
						</div>
						<div class="panel-body text-center">
							<button type="button"data-layanan="wna" class="btn-layanan btn btn-xl btn-warning waves-effect waves-light">Ambil Nomor</button>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<div class="card-box text-center">
						<h1>Nomor Antrian</h1>
						<h1><b id="no-antrian">0-000</b></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" id="url" value="{{ url('/nomor-antrian') }}">

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
	<script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>

	<script>
		$(document).ready(function() {
			var url = $('#url').val();

			$.ajaxSetup({
				headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
			});

			$(document).on('click', '.btn-layanan', function() {
				var layanan = $(this).attr('data-layanan');

				$.ajax({
					url     : url,
					method  : "POST",
					data    : { layanan : layanan },
					success : function(data) {
						$('#no-antrian').text(data.no_antrian);
					},
					error	: function(err) {
						console.log(err);
					}
				});
			});

			// test();
			// function test() {
			// 	$.ajax({
			// 		url     : url,
			// 		method  : "POST",
			// 		data 	: {},
			// 		success : function(data) {
			// 			$('#no-antrian').text(data);
			// 			test();
			// 		},
			// 		error	: function(err) {
			// 			// location.reload();
			// 			console.log(err);
			// 		}
			// 	});
			// }

			// function test() {
			// 	$.getJSON('public/json/customer.json', function(data) {
			// 		var no_antrian;
			// 		$.each(data, function(i, val) {
			// 			no_antrian = val.no_antrian;
			// 		});
			// 		$('#no-antrian').text(no_antrian);
			// 		test();
			// 	})
			// }
		});
	</script>
</body>
</html>