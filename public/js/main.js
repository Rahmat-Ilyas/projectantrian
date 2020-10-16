// $(document).ready(function() {
// 	var url = $('#url').val();
// 	var layanan = $('#layanan').val();
// 	var loket_id = $('#loket_id').val();

// 	$.ajaxSetup({
// 		headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
// 	});

// 	cek_status();

// 	$(document).on('click', '.btn-start', function() {
// 		$(this).attr('disabled', 'true');
// 		set_data();
// 	});

// 	$(document).on('click', '.btn-call', function() {
// 		$(this).attr('disabled', 'true');
// 		var customer_id = $('#get-id').val();
// 		$.ajax({
// 			url     : url,
// 			method  : "POST",
// 			data    : { req: 'set-call', layanan: layanan, loket_id: loket_id, customer_id: customer_id },
// 			success : function(data) {
// 				cek_antrian();
// 			}
// 		});
// 	});

// 	$(document).on('click', '.btn-next', function() {
// 		$(this).attr('disabled', 'true');
// 		$('.btn-recall').attr('disabled', 'true');
// 		$('.btn-modal-skip').attr('disabled', 'true');
// 		$('.info').removeAttr('hidden');
// 		mysetTime();
// 		skipTo = 0;
// 		batalTo = 0;
// 	});

// 	$(document).on('click', '.btn-skip', function() {
// 		var no_antrian = $('#this-view').text();
// 		$.ajax({
// 			url     : url,
// 			method  : "POST",
// 			data    : { req: 'skip-antrian', no_antrian: no_antrian },
// 			success : function(data) {
// 				set_data();
// 				cek_status();
// 				$('.modal-skip').modal('hide');
// 			}
// 		});
// 	});

// 	$(document).on('click', '.btn-recall', function() {
// 		var no_antrian = $('#this-view').text();
// 		$.ajax({
// 			url     : url,
// 			method  : "POST",
// 			data    : { req: 'recall-antrian', no_antrian: no_antrian },
// 			success : function(data) {
// 				$('.info-recall').removeAttr('hidden');
// 				cek_antrian();
// 			}
// 		});
// 	});

//       // Function
//       function cek_status() {
//       	var no_antrian = $('#this-view').text();
//       	$.ajax({
//       		url     : url,
//       		method  : "POST",
//       		data    : { req: 'cek-status', loket_id: loket_id, no_antrian: no_antrian },
//       		success : function(data) {
//       			if (data.status == 'view') {
//       				$('#call').removeAttr('hidden');
//       				$('#start').attr('hidden', 'true');
//       				$('#action').attr('hidden', 'true');
//       			} else if (data.status == 'calling') {
//       				cek_antrian();
//       			} else if (data.status == 'proses') {
//       				$('#call').attr('hidden', 'true');
//       				$('#start').attr('hidden', 'true');
//       				$('#action').removeAttr('hidden');
//       			} else {
//       				$('#call').attr('hidden', 'true');
//       				$('#start').removeAttr('hidden');
//       				$('#action').attr('hidden', 'true');
//       			}

//       			if (data.status != 'empty') {
//       				$('#this-view').text(data.no_antrian);
//       				$('#kd-skip').text(data.no_antrian);
//       				$('#get-id').val(data.id);
//       				$('#status').text('');
//       				$('.btn-call').html('<i class="fa fa-fw fa-microphone"></i> Panggil');
//       				$('.btn-call').removeAttr('disabled');
//       			}
//       		},
//       		error	: function(err) {
//       			location.reload();
//       		}
//       	});
//       }

//       function set_data() {
//       	$.ajax({
//       		url     : url,
//       		method  : "POST",
//       		data    : { req: 'set-data', layanan: layanan, loket_id: loket_id },
//       		success : function(data) {
//       			if (data.no_antrian) {
//       				$('#this-view').text(data.no_antrian);
//       				$('#kd-skip').text(data.no_antrian);
//       				$('#get-id').val(data.id);
//                               cek_status();
//                         } else {
//                             alert('Tidak ada antrian ata antrian sudah habis');
//                             $('#this-view').text('0-000');
//                             $('#call').attr('hidden', 'true');
//                             $('#start').removeAttr('hidden');
//                             $('#action').attr('hidden', 'true');
//                             $('.btn-start').removeAttr('disabled');
//                       }
//                 },
//                 error : function(err) {
//                   location.reload();
//             }
//       });
//       }

//       function update_status() {
//       	var no_antrian = $('#this-view').text();

//       	$.ajax({
//       		url     : url,
//       		method  : "POST",
//       		data    : { req: 'update-status', no_antrian: no_antrian }
//       	});
//       }

//       function cek_antrian() {
//       	var no_antrian = $('#this-view').text();
//       	$.ajax({
//       		url     : url,
//       		method  : "POST",
//       		data    : { req: 'cek-antrian', loket_id: loket_id, no_antrian: no_antrian },
//       		success : function(data) {
//       			if (data.status == 'finsh') {
//       				$('#call').attr('hidden', 'true');
//       				$('#start').attr('hidden', 'true');
//       				$('#action').removeAttr('hidden');
//       				$('.info-recall').attr('hidden', 'true');
//       			} else if (data.status == 'calling' || data.status == 'waiting') {
//       				$('#call').removeAttr('hidden');
//       				$('#start').attr('hidden', 'true');
//       				$('#action').attr('hidden', 'true');
//       				$('#status').text('Panggilan dalam antrian, tunggu sebentar');
//       				$('.btn-call').html('<i class="fa fa-fw fa-spinner"></i> Sedang diproses...');
//       				$('.btn-call').attr('disabled', 'true');
//       				cek_antrian();
//       			} else {
//       				$('#call').attr('hidden', 'true');
//       				$('#start').attr('hidden', 'true');
//       				$('#action').removeAttr('hidden');
//       				$('.info-recall').attr('hidden', 'true');
//       			}
//       		},
//                   error : function(err) {
//                         location.reload();
//                   }
//             });
//       }

//       // Settimer
//       var downloadTimer;
//       var skipTo;
//       var batalTo;
//       function mysetTime() {
//       	var timeleft = 5;
//       	var downloadTimer = setInterval(function() {
//       		$('#setTime').text(timeleft);
//       		timeleft -= 1;
//       		if (timeleft < 0) {
//       			clearInterval(downloadTimer);
//       			$('.btn-next').removeAttr('disabled');
//       			$('.info').attr('hidden', 'hidden');
//       			update_status();
//       			set_data();
//       			cek_status();
//       		}

//       		if (skipTo == 100) {
//       			clearInterval(downloadTimer);
//       			$('.btn-next').removeAttr('disabled');
//       			$('.btn-recall').removeAttr('disabled');
//       			$('.btn-modal-skip').removeAttr('disabled');
//       			$('.info').attr('hidden', 'hidden');
//       			update_status();
//       			set_data();
//       			cek_status();
//       		}

//       		if (batalTo == 100) {
//       			clearInterval(downloadTimer);
//       			$('.btn-next').removeAttr('disabled');
//       			$('.btn-recall').removeAttr('disabled');
//       			$('.btn-modal-skip').removeAttr('disabled');
//       		}
//       	}, 1000);
//       }

//       $(document).on('click', '.nextSt', function(e) {
//       	e.preventDefault();
//       	skipTo = 100;
//       });

//       $(document).on('click', '.batalSt', function(e) {
//       	e.preventDefault();
//       	$('.info').attr('hidden', 'hidden');
//       	batalTo = 100;
//       });

//       info_antrian();
//       function info_antrian() {
//       	$.ajax({
//       		url     : url,
//       		method  : "POST",
//       		data    : { req: 'info-antrian', loket_id: loket_id, layanan: layanan },
//       		success : function(data) {
//       			if (data.info) {
//       				$('#jum-antr').text(data.jum_antr);
//       				$('#antr-skrg').text(data.antr_skrg);
//       				$('#antr-next').text(data.antr_next);
//       				$('#sisa-antr').text(data.sisa_antr);
//       			}
//       		},
//       		error	: function(err) {
//       			location.reload();
//       		}
//       	});
//       }

// });



$(document).ready(function() {
      var url = $('#url').val();
      var layanan = $('#layanan').val();
      var loket_id = $('#loket_id').val();

      $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
      });

      cek_status();

      $(document).on('click', '.btn-start', function() {
            $(this).attr('disabled', 'true');
            set_data();
      });

      $(document).on('click', '.btn-call', function() {
            $(this).attr('disabled', 'true');
            $('.btn-pause').attr('disabled', 'true');
            var customer_id = $('#get-id').val();
            $.ajax({
                  url     : url,
                  method  : "POST",
                  data    : { req: 'set-call', layanan: layanan, loket_id: loket_id, customer_id: customer_id },
                  success : function(data) {
                        cek_antrian();
                        calling();
                  }
            });
      });

      $(document).on('click', '.btn-pause', function() {
            $(this).attr('disabled', 'true');
            $('.btn-call').attr('disabled', 'true');
            var customer_id = $('#get-id').val();
            $.ajax({
                  url     : url,
                  method  : "POST",
                  data    : { req: 'pause-antrian', customer_id: customer_id },
                  success : function(data) {
                     $('.btn-start').removeAttr('disabled');
                     cek_status();
                  }
            });
      });

      $(document).on('click', '.btn-recall', function() {
         var no_antrian = $('#this-view').text();
         $('.info-recall').removeAttr('hidden');
         $('.btn-recall').attr('disabled', 'true');
         $('.btn-next').attr('disabled', 'true');
         $('.btn-modal-skip').attr('disabled', 'true');
         $.ajax({
               url     : url,
               method  : "POST",
               data    : { req: 'recall-antrian', no_antrian: no_antrian, loket_id: loket_id },
               success : function(data) {
                     
               }
         });
   });

      $(document).on('click', '.btn-skip', function() {
         var no_antrian = $('#this-view').text();
         $.ajax({
               url     : url,
               method  : "POST",
               data    : { req: 'skip-antrian', no_antrian: no_antrian },
               success : function(data) {
                     set_data();
                     info_antrian();
                     $('.modal-skip').modal('hide');
               }
         });
   });

      $(document).on('click', '.btn-next', function() {
            Swal.fire({
                  title: 'Antrian Selanjutnya',
                  html: 'Antrian selanutnya akan dimuat dalam <b><span>5</span> detik..</b>',
                  type: 'info',
                  showCancelButton : true,
                  cancelButtonColor : '#d33',
                  confirmButtonColor : '#3085d6',
                  confirmButtonText : 'Lanjutkn Sekarang',
                  cancelButtonText : 'Batalkan',
                  timer: 5000,
                  onBeforeOpen: () => {
                        var timeleft = 4;
                        timerInterval = setInterval(() => {
                              const content = Swal.getContent();
                              if (content) {
                                    const span = content.querySelector('span')
                                    span.textContent = timeleft;
                              }
                              timeleft -= 1;
                        }, 1000)
                  },
                  onClose: () => {
                      clearInterval(timerInterval)
                  }
            }).then((result) => {
                if (result.value || result.dismiss === Swal.DismissReason.timer) {
                  $('.btn-recall').attr('disabled', 'true');
                  $('.btn-next').attr('disabled', 'true');
                  $('.btn-modal-skip').attr('disabled', 'true');
                  var no_antrian = $('#this-view').text();
                  $.ajax({
                        url     : url,
                        method  : "POST",
                        data    : { req: 'update-status', no_antrian: no_antrian },
                        success : function(data) {
                              set_data();
                        }
                  });
                }
          });
   });


      // Function
      function cek_status() {
            var no_antrian = $('#this-view').text();
            $.ajax({
                  url     : url,
                  method  : "POST",
                  data    : { req: 'cek-status', loket_id: loket_id, no_antrian: no_antrian },
                  success : function(data) {
                        if (data.status == 'view') {
                              $('#call').removeAttr('hidden');
                              $('#start').attr('hidden', 'true');
                              $('#action').attr('hidden', 'true');
                        } else if (data.status == 'calling') {
                              cek_antrian();
                        } else if (data.status == 'proses') {
                              $('#call').attr('hidden', 'true');
                              $('#start').attr('hidden', 'true');
                              $('#action').removeAttr('hidden');
                        } else {
                              $('#call').attr('hidden', 'true');
                              $('#start').removeAttr('hidden');
                              $('#action').attr('hidden', 'true');
                        }

                        if (data.status != 'empty') {
                              $('#this-view').text(data.no_antrian);
                              $('#kd-skip').text(data.no_antrian);
                              $('#get-id').val(data.id);
                              $('#status').text('');
                              $('.btn-call').html('<i class="fa fa-fw fa-microphone"></i> Panggil');
                              $('.btn-call').removeAttr('disabled');
                              $('.btn-pause').removeAttr('disabled');
                        }
                  }
            });
      }

      function cek_antrian() {
            var no_antrian = $('#this-view').text();
            $.ajax({
                  url     : url,
                  method  : "POST",
                  data    : { req: 'cek-antrian', loket_id: loket_id, no_antrian: no_antrian },
                  success : function(data) {
                        if (data.status == 'calling' || data.status == 'waiting') {
                              $('#call').removeAttr('hidden');
                              $('#start').attr('hidden', 'true');
                              $('#action').attr('hidden', 'true');
                              $('#status').text('Panggilan dalam antrian, tunggu sebentar');
                              $('.btn-call').html('<i class="fa fa-fw fa-spinner"></i> Sedang diproses...');
                              $('.btn-call').attr('disabled', 'true');
                        } else {
                              $('#call').attr('hidden', 'true');
                              $('#start').attr('hidden', 'true');
                              $('#action').removeAttr('hidden');
                              $('.info-recall').attr('hidden', 'true');
                              $('.btn-recall').removeAttr('disabled');
                              $('.btn-next').removeAttr('disabled');
                              $('.btn-modal-skip').removeAttr('disabled');
                        }
                  }
            });
      }

      function set_data() {
            $.ajax({
                  url     : url,
                  method  : "POST",
                  data    : { req: 'set-data', layanan: layanan, loket_id: loket_id },
                  success : function(data) {
                        if (data.no_antrian) {
                              $('#this-view').text(data.no_antrian);
                              $('#kd-skip').text(data.no_antrian);
                              $('#get-id').val(data.id);
                              cek_status();
                        } else {
                            $('#this-view').text('0-000');
                            $('#call').attr('hidden', 'true');
                            $('#start').removeAttr('hidden');
                            $('#action').attr('hidden', 'true');
                            $('.btn-start').removeAttr('disabled');
                            Swal.fire({
                              title: 'Tidak Ada Antrian',
                              html: 'Antrian tidak ada atau antrian sudah habis',
                              type: 'info',
                              confirmButtonColor : '#3085d6',
                              confirmButtonText : 'Ok',
                           });
                      }
                }
          });
      }

      function calling() {
            var no_antrian = $('#this-view').text();
            $.ajax({
                  url     : url,
                  method  : "POST",
                  data    : { req: 'call-antrian', no_antrian: no_antrian, loket_id: loket_id },
                  success : function(data) {
                        info_antrian();
                  }
            });
      }

      // info antrian
      info_antrian();
      function info_antrian() {
         $.ajax({
               url     : url,
               method  : "POST",
               data    : { req: 'info-antrian', loket_id: loket_id, layanan: layanan },
               success : function(data) {
                     if (data.info) {
                           $('#jum-antr').text(data.jum_antr);
                           $('#antr-skrg').text(data.antr_skrg);
                           $('#antr-next').text(data.antr_next);
                           $('#sisa-antr').text(data.sisa_antr);
                     }
               }
         });
   }

      // Pusher
      Pusher.logToConsole = true;
      var pusher = new Pusher('4d40d07634a61b27e526', {
            cluster: 'ap1'
      });

      var channel = pusher.subscribe('finish-channel-'+loket_id);
      channel.bind('App\\Events\\FinishEvent', function(data) {
            cek_antrian();
      });

      var channel_ = pusher.subscribe('nomor-antrian');
      channel_.bind('App\\Events\\NomorAntrianEvent', function(data) {
            info_antrian();
      });

      var channel__ = pusher.subscribe('action-channel');
      channel__.bind('App\\Events\\ActionEvent', function(data) {
            info_antrian();
      });

      function sleep(time) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > time) {
                    break;
                }
            }
        }

});