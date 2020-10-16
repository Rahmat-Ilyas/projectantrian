@extends('layouts.dashboard')
@section('konten')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Manajemen User
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Master Data</a></li>
            <li><a href="#">Manajemen User</a></li>
            <li class="active">Index User</li>
          </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
  
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tabel User</h3>
              </div>
     

              <div class="container">
                <div class="row" style="margin:10px 10px 10px 10px;">
                <a href="{{ route('userloket.create') }}" role="button" title="Form Tambah User" class="btn btn-primary btn-sm modalShowX"><i class="fa fa-fw fa-user-plus"></i> Tambah User</a>
                  </div>
              </div>

              <div class="box-body">
          
                    <a href="{{ route('table.users') }}" id="ajaxUrlUser"></a>

                  <table id="user" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama</th>
                      <th>loket</th>
                      <th>email</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Nama</th>
                      <th>loket</th>
                      <th>email</th>
                      <th>Aksi</th>
                    </tr>
                    </tfoot>
                  </table>
              

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>

</div>

@endsection
