$(document).ready(function() {
	var url = $('#url').val();

	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
	});

	get_info();
	function get_info() {
		$.ajax({
			url     : url,
			method  : "POST",
			data    : { req: 'admin-config' },
			success : function(data) {
				$('.loket').text(data.loket);
				$('.userX').text(data.user);
				$('.antrian').text(data.antrian);
				$('.meja1').text(data.meja1);
				$('.meja2').text(data.meja2);
				$('.meja3').text(data.meja3);
				$('.meja4').text(data.meja4);
				$('.meja5').text(data.meja5);
				$('.meja6').text(data.meja6);
			}
		});
	}

	$('#reset').click(function(e) {
		e.preventDefault();
		swal({
			title: 'Reset Antrian?',
			html: 'Apakah anda yakin ingin merestar data antrin?',
			showCancelButton : true,
			confirmButtonColor : '#3085d6',
			cancelButtonColor : '#d33',
			confirmButtonText : 'Restar',
			cancelButtonText : 'Batal',

		}).then((result) => {
			var url = $('#url').val();

			$.ajax({
				url     : url,
				method  : "POST",
				data    : { req: 'reset-antrian' },
				success : function(data) {
					swal("Berhasil!", "Antrian berhasil di reset", "success");
					get_info();
				}
			});
		});
	});

	// Enable pusher logging - don't include this in production
	Pusher.logToConsole = true;
	var pusher = new Pusher('4d40d07634a61b27e526', {
		cluster: 'ap1'
	});

	var channel = pusher.subscribe('nomor-antrian');
	channel.bind('App\\Events\\NomorAntrianEvent', function(data) {
		$('.antrian').text(data.antrian);
		get_info();
	});

	var channel_ = pusher.subscribe('action-channel');
	channel_.bind('App\\Events\\ActionEvent', function(data) {
		get_info();
	});
});