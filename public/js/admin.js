$('body').on('click','.modalShow', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title')
  
        
        $('#modal-title').text(title);

    //     $.ajax({
    //         url  : url,
    //         dataType : 'html',
    //         success : function (response) {
    //             $('#modal-body').html(response);
    //         },
    //         error : function (xhr) {
    //             alert(xhr);
    //         }
    //     });

        $('#MyModal').modal('show');
     
})

$('body').on('click','.modalShowX', function (event) {
    event.preventDefault();
   

    var me = $(this),
    url = me.attr('href'),
    title = me.attr('title')

    
    $('#modal-titleLoket').text(title);

    $.ajax({
        url  : url,
        dataType : 'html',
        success : function (response) {
            $('#modal-bodyLoket').html(response);
        },
        error : function (xhr) {
            alert(xhr);
        }
    });

    $('#MyModalLoket').modal('show');
})

$('body').on('click','.modalShowVideo', function (event) {
    event.preventDefault();
   

    var me = $(this),
    url = me.attr('href'),
    title = me.attr('title')

    
    $('#modal-titleVideo').text(title);

    $.ajax({
        url  : url,
        dataType : 'html',
        success : function (response) {
            $('#modal-bodyVideo').html(response);
        },
        error : function (xhr) {
            alert(xhr);
        }
    });

    $('#MyModalVideo').modal('show');
})

$('#modal-btn-save').click(function () {

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = form.attr('method')

    

        $.ajax({
            url : url,
            method : method,
            data : form.serialize(),
            beforeSend : function () {
                $("#loader").show();  
            },
            success : function (response) {
               
                form.trigger('reset');
                $('#MyModal').modal('hide');
                $('body','#loket').DataTable().ajax.reload();
                swal({
                    type : 'success',
                    title : 'Data Loket',
                    text : 'Berhasil di Proses'
                })

            },
            complete:function(data){
                $("#loader").hide();
            },
            error : function () {
                swal({
                    type : 'error',
                    title : 'Cafe 2d Property',
                    text : 'Gagal Menginput'
                })
            }
           
        })
})


$('#modal-btn-saveLoket').click(function () {

    var form = $('#modal-bodyLoket form'),
        url = form.attr('action'),
        method = form.attr('method')
        $.ajax({
            url : url,
            method : method,
            data : new FormData(form[0]),
            contentType : false,
            processData: false,
            datatype : 'JSON',
            beforeSend : function () {
                $("#loader").show();  
            },
            success : function (response) {
                $('.warningError').css('display','none');
                form.trigger('reset');
                $('#MyModalLoket').modal('hide');
                $('#user').DataTable().ajax.reload();
                swal({
                    type : 'success',
                    title : 'Data User',
                    text : 'Berhasil di Proses'
                })

            },
            complete:function(data){
                $("#loader").hide();
            },
            error : function (xhr) {
             
                var res = xhr.responseJSON;
                if($.isEmptyObject(res) == false){
                  
                  $('.errorAlert').find('ul').html('');
                  $('.warningError').css('display','block');
  
                  $.each(res.errors, function (key, value) {
                      $('.errorAlert').find('ul').append('<li>'+value+'</li>')
                  })
  
                }

            }
           
        })
})


$('#modal-btn-saveVideo').click(function () {

    var form = $('#modal-bodyVideo form'),
        url = form.attr('action'),
        method = form.attr('method'),
        red = $('#routeRedirectLink a').attr('href')

       
        $.ajax({
            url : url,
            method : method,
            data : new FormData(form[0]),
            contentType : false,
            processData: false,
            datatype : 'JSON',
            beforeSend : function () {
                $("#loader").show();  
            },
            success : function (response) {
                $('.warningError').css('display','none');
                form.trigger('reset');
                $('#MyModalVideo').modal('hide');
                


                swal({
                    type : 'success',
                    title : 'Data User',
                    text : 'Berhasil di Proses'
                })

                setTimeout(function () {
                    window.location.href = red
                },3000)
        
            },
            complete:function(data){
                $("#loader").hide();
            },
            error : function (xhr) {
             
                var res = xhr.responseJSON;
                if($.isEmptyObject(res) == false){
                  
                  $('.errorAlert').find('ul').html('');
                  $('.warningError').css('display','block');
  
                  $.each(res.errors, function (key, value) {
                      $('.errorAlert').find('ul').append('<li>'+value+'</li>')
                  })
  
                }

            }
           
        })
})


$('body').on('click','.simpanTeksJalan',function (event) {
    event.preventDefault();

    var me = $('#formTeksJalan');
        url = me.attr('action'),
        method = me.attr('method'),
        red = $('#routeRedirectLink a').attr('href')

        $.ajax({
            url : url,
            method : method,
            data : me.serialize(),
            beforeSend : function () {
                $("#loader").show();  
            },
            success : function (response) {
    
                swal({
                    type : 'success',
                    title : 'Data Teks Berjalan',
                    text : 'Berhasil di Ubah'
                })

                setTimeout(function () {
                    window.location.href = red
                },2000)
        
            },
            complete:function(data){
                $("#loader").hide();
            },
            error : function (xhr) {
             
                var res = xhr.responseJSON;
                if($.isEmptyObject(res) == false){
                  
                  $('.errorAlert').find('ul').html('');
                  $('.warningError').css('display','block');
  
                  $.each(res.errors, function (key, value) {
                      $('.errorAlert').find('ul').append('<li>'+value+'</li>')
                  })
  
                }

            }
           
        })

})


$(document).ready(function () {

var me =  $('#ajaxUrlUser').attr('href');
var meX =  $('#ajaxUrlLoket').attr('href');
var meY = $('#ajaxUrlAntrian').attr('href');


$('#user').DataTable({
    responsive : true,
    processing : true,
    serverSide : true,
    ajax : me,
    columns : [
        {data:'name', name:'name'},
        {data:'loket_id', name:'loket_id'},
        {data:'email', name:'email'},
        {data:'action', name:'action'}
    ]   
})


$('#loket').DataTable({
    responsive : true,
    processing : true,
    serverSide : true,
    ajax : meX,
    columns : [
        {data:'gets', name:'gets'},
        {data:'nama_loket', name:'nama_loket'},
        {data:'layanan', name:'layanan'},
        {data:'status', name:'status'},
        {data:'action', name:'action'}
    ]   
})

$('#antrianAll').DataTable({
    responsive : true,
    processing : true,
    serverSide : true,
    ajax : meY,
    columns : [
        {data:'no_antrian', name:'no_antrian'},
        {data:'kategori', name:'kategori'},
        {data:'loket_id', name:'loket_id'},
        {data:'status', name:'status'},
        {data:'created_at', name:'created_at'}
    ]   
})

})

$('body').on('click','.delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        token = $('meta[name="csrf-token"]').attr('content')

       
        swal({
            title: "Apa Kamu Yakin ?",
            text: "Anda tidak akan dapat memulihkan data ini!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url  : url,
                    type : 'POST',
                    data : {
                        '_method' : 'DELETE',
                        '_token' : token
                    },
                    success: function (response) {
                        $('#user').DataTable().ajax.reload();
                        swal("Manajemen User", "Data Anda Sudah Terhapus.", "success");
                    }
                })
            }else{
                swal("Batal", "Data ini aman :)", "error");
            }
        });

})




