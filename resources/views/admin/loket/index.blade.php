@extends('layouts.dashboard')
@section('konten')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Kelola Loket
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Master Data</a></li>
            <li><a href="#">Kelola Loket</a></li>
            <li class="active">Index Loket</li>
          </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
  
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tabel Loket</h3>
              </div>
    

              <div class="box-body">
                <a href="{{ route('table.loketdata') }}" id="ajaxUrlLoket"></a>

                <table id="loket" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Layanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Layanan</th>
                    <th>Status</th>
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
