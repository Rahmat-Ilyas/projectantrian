
{!! Form::model($model, [
    'route' => 'video.update',
    'method'=> 'POST',
    'class'=> 'form-horizontal'  
]) !!}

      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">File</label>

        <div class="col-sm-8">
            <input type="file" class="form-control" name="foto">
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