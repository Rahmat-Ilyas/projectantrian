
{!! Form::model($model, [
    'route' =>  ['loket.update',$model->id],
    'method'=>  'PUT',
    'class'=> 'form-horizontal'  
]) !!}


      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">Nama Loket</label>

        <div class="col-sm-8">
            {!! Form::text('nama_loket',null,['class'=>'form-control','id
            '=>'inputLoket']) !!}
        </div>
      </div>

      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">Layanan</label>

        <div class="col-sm-8">
            {!! Form::text('layanan',null,['class'=>'form-control','id
            '=>'inputLoket']) !!}
        </div>
      </div>

      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">Status</label>

        <div class="col-sm-8">
            {!! Form::select('status', ['off' => 'off', 'on' => 'on'], null, ['placeholder' => 'Pilih','class'=>'form-control','id'=>'status']); !!}
        </div>
      </div>
  
  </form>


  {!! Form::close() !!}