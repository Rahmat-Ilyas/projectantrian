
{!! Form::model($val, [
    'route' => ['userloket.changepass',$val],
    'method'=> 'PUT',
    'class'=> 'form-horizontal'  
]) !!}
   
      <p class="text-yellow" style="text-align:center;"><i class="fa fa-fw fa-warning"></i> Input Apabila ingin Mengganti Password</p>

      <div class="form-group">
       <label for="inputLoket" class="col-sm-3 control-label">Input Password Baru</label>
     
       <div class="col-sm-8">
          <input type="password" class="form-control" name="password">
       </div>
     </div>


    
 
     <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="alert alert-danger bg-danger text-white border-0 warningError" role="alert" style="display: none">
            <strong>Gagal Menginput !!!</strong>
            <div class="errorAlert">
                <ul></ul>
            </div>
        </div>
        </div>
    </div>   
    </div>



  {!! Form::close() !!}