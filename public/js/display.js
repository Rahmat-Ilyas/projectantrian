$(document).ready(function() {
	var url = $('#url').val();

	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
	});

	   // get data
       information();
       function information() {
           $.ajax({
              url     : url,
              method  : "POST",
              data    : { req: 'get-data' },
              success : function(data) {
                $('.loket1').text(data.loket1);
                $('.loket2').text(data.loket2);
                $('.loket3').text(data.loket3);
                $('.loket4').text(data.loket4);
                $('.loket5').text(data.loket5);
                $('.loket6').text(data.loket6);
            }
        });
       }

        // Calling
        var status;
        status = true;
        call();
        function call(){
            console.log("status = "+status);
            if (status == true) {
                status = false;
                request();
            }
        }

        function request() {
            $.ajax({
                url     : url,
                method  : "POST",
                data    : { req: 'calling' },
                success : function(data) {
                    if (data.voice) {
                        $('#calling').text(data.no_antrian);
                        $('.loket').text(data.loket);

                        var v_kode = new Audio('/assets/voice/kode/'+data.kode+'.mp3');
                        var v_nomor = new Audio('/assets/voice/nomor/'+data.nomor+'.mp3');
                        var v_meja = new Audio('/assets/voice/meja/'+data.meja+'.mp3');

                        var voice = [v_kode, v_nomor, v_meja];
                        var i = -1;

                        $('#myVideo').on('play', function() {
                            $('#trigerAudio')[0].play();
                        })

                        v_kode.play();
                        v_kode.addEventListener('ended', function() {
                            v_nomor.play()
                        });
                        v_nomor.addEventListener('ended', function() {
                            v_meja.play()
                        });
                        v_meja.addEventListener('ended', function() {
                            console.log('selesai = '+data.no_antrian);
                            finish(data.loket);
                            update();
                            request();
                            return;
                        });
                    } else {
                        status = true;
                    }
                }
            });
        }

        function finish(loket_id) {
        	$.ajax({
        		url     : url,
        		method  : "POST",
        		data    : { req: 'finish', loket_id: loket_id }
        	});
        }

        function update() {
            $.ajax({
                url     : url,
                method  : "POST",
                data    : { req: 'update' }
            });
        }

        Pusher.logToConsole = true;
        var pusher = new Pusher('4d40d07634a61b27e526', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('calling-channel');
        channel.bind('App\\Events\\CallingEvent', function(data) {
            call();
            information();
        });

        var channel_ = pusher.subscribe('action-channel');
        channel_.bind('App\\Events\\ActionEvent', function(data) {
            information();
        });

        // var kode = data.no_antrian;
        // var kd = kode.substring(0, 1);

        // var no1 = kode.substring(1, 5).replace("-00", "");
        // var no2 = kode.substring(1, 5).replace("-0", "");
        // var cek1 = kode.substring(4, 5);
        // var cek2 = kode.substring(3, 5);
        // if (no1 == cek1) no = no1;
        // else if (no2 == cek2) no = no2;
        // else no = kode.substring(2, 5);

        // responsiveVoice.speak("Nomor Antrian '" + kd + ", " + no + "' Silahkan Menuju ke Meja " + data.loket_id, "Indonesian Male", {
        //     pitch: 0.9,
        //     rate: 0.9,
        //     volume: 2
        // });

        // $('#calling').text(data.no_antrian);
        // $('.loket').text(data.loket_id);

        // update(data.no_antrian);
        // sleep(6000);

        function sleep(time) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > time) {
                    break;
                }
            }
        }
    });