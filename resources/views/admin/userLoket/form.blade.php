
{!! Form::model($model, [
    'route' => $model->exists ?  ['userloket.update',$model->id] : 'userloket.store',
    'method'=> $model->exists ?  'PUT' : 'POST',
    'class'=> 'form-horizontal'  
]) !!}


      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">Nama</label>

        <div class="col-sm-8">
            {!! Form::text('name',null,['class'=>'form-control','id
            '=>'inputLoket']) !!}
        </div>
      </div>

      <input type="hidden" name="destinasi" value="{{asset('image/fotoUser/') }}">

      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">Pilih Loket</label>

        <div class="col-sm-8">
            <select name="loket_id" class="form-control">
              @if ($model->exists)
              <option value="{{ $model->loket_id }}" selected> {{ $model->loket_id }} </option>
              <option  disabled> -- Pilih -- </option>
              @foreach ($loket as $item)
          <option value="{{ $item->gets }}"> {{ $item->gets }} </option>
              @endforeach
              @else
              <option selected disabled> -- Pilih -- </option>
              @foreach ($loket as $item)
          <option value="{{ $item->gets }}"> {{ $item->gets }} </option>
              @endforeach
              @endif
              
            </select>
        </div>
      </div>

      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">Foto</label>

        <div class="col-sm-8">
          <input type="hidden" value="{{ $model->foto }}" name="tampungFoto">
          @if ($model->exists)
          <span><p class="text-aqua"><i class="fa fa-fw fa-file-image-o"></i> {{ $model->foto }}</p></span>
            @endif
         <input type="file" class="form-control" name="foto">
        </div>
      </div>

      <div class="form-group">
        <label for="inputLoket" class="col-sm-3 control-label">E-mail</label>
        <div class="col-sm-8">
            {!! Form::email('email',null,['class'=>'form-control','id
            '=>'inputLoket']) !!}
        </div>
      </div>

 @if ($model->exists)

 <hr>

 <p class="text-yellow" style="text-align:center;"><i class="fa fa-fw fa-warning"></i> Input Apabila ingin Mengganti Password</p>

 <div class="form-group">
  <label for="inputLoket" class="col-sm-3 control-label">Input Password Baru</label>

  <div class="col-sm-8">
     <input type="password" class="form-control" name="tampungPass">
  </div>
</div>
 @else
 <div class="form-group">
  <label for="inputLoket" class="col-sm-3 control-label">Password</label>

  <div class="col-sm-8">
      {!! Form::text('password',null,['class'=>'form-control','id
      '=>'inputLoket']) !!}
  </div>
</div>
 @endif

    
 
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