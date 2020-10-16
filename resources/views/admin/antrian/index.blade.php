@extends('layouts.dashboard')
@section('konten')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Data Antrian
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Master Data</a></li>
            <li><a href="#">Kelola Loket</a></li>
            <li class="active">Data Antrian</li>
          </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
  
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Tabel Antrian</h3>
              </div>
    

              <div class="box-body">

                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No Antrian</th>
                    <th>Kategori</th>
                    <th>Loket</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                   <tbody>
                    @foreach($customer as $dta)
                    @php
                    // kategori
                    $ktgr = $dta->kategori;
                    if ($ktgr == 'umum' || $ktgr == 'prioritas') $kategori = 'WNI';
                    else if ($ktgr == 'wna') $kategori = 'WNA';
                    else $kategori = 'BAP';

                    // nomor Loket
                    if (isset($dta->loket_id)) $loket = 'Meja '.$dta->loket_id;
                    else $loket = '-';

                    // status
                    if ($dta->status == 'finish') {
                      $status = 'Selesai diproses';
                      $warna = 'text-success';
                    }
                    else {
                      $status = 'Sedang diproses';
                      $warna = 'text-primary';
                    }
                    @endphp
                    <tr>
                      <td>{{ $dta->no_antrian }}</td>
                      <td>{{ $kategori }}</td>
                      <td>{{ $loket }}</td>
                      <td class="{{ $warna }}">{{ $status }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No Antrian</th>
                    <th>Kategori</th>
                    <th>Loket</th>
                    <th>Status</th>
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
