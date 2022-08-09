@extends('layout')
@section('title','Laporan - ATventory')

@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Laporan</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Laporan Data Penjualan & Pembelian</li>    
        <!-- <li class="breadcrumb-item active">Re-Stok</li> -->
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Laporan Penjualan</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->

              
              <table class="table datatable" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Penjualan</th>
                    <th scope="col">ID Outlet</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Harga Per Satuan</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Jual</th>
                  </tr>
                </thead>
                @php($total=0)
                @foreach ($lap_penjualan as $data)
                  <tr>
                    <td>{{ $data->id_penjualan }}</td>
                    <td>{{ $data->id_outlet }}</td>
                    <td>{{ $data->id_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>{{ $data->jenis_barang }}</td>
                    <td>Rp {{ number_format($data->harga_jual) }}</td>
                    <td>{{ $data->satuan }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->totalhrg) }}</td>
                    @php($total += $data->totalhrg)
                    <td>{{ $data->tgl_jual }}</td>
                  </tr>
                @endforeach
                <tr>
                    <td></td> <td></td>
                    <td></td> <td></td>
                    <td></td> <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td><strong>Rp {{number_format($total)}}</strong></td>  <td></td>
                  </tr>
              </table>
              
              <button data-toggle="modal" data-target="#modalCetakJual" class="btn btn-danger ri-printer-line"> Print PDF</button> <a></a> 
              <button data-toggle="modal" data-target="#modalExportJual" class="btn btn-success ri-file-excel-2-line"> Print Excel</button> <a></a> 
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      <!-- </div> -->
      </div>
    </section>
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Laporan Pembelian</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->
              
              <table class="table datatable" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Pembelian</th>
                    <th scope="col">ID Supplier</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Harga Per Satuan</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Beli</th>
                  </tr>
                </thead>
                @php($total=0)
                @foreach ($lap_pembelian as $data)
                  <tr>
                    <td>{{ $data->id_pembelian }}</td>
                    <td>{{ $data->id_supplier }}</td>
                    <td>{{ $data->id_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>{{ $data->jenis_barang }}</td>
                    <td>Rp {{ number_format($data->harga_jual) }}</td>
                    <td>{{ $data->satuan }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->totalhrg) }}</td>
                    @php($total += $data->totalhrg)
                    <td>{{ $data->tgl_beli }}</td>
                  </tr>
                @endforeach
                <tr>
                    <td></td> <td></td>
                    <td></td> <td></td>
                    <td></td> <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td><strong>Rp {{number_format($total)}}</strong></td>  <td></td>
                  </tr>
              </table>
              
              <button data-toggle="modal" data-target="#modalCetakBeli" class="btn btn-danger ri-printer-line"> Print PDF</button> <a></a> <a></a> 
              <button data-toggle="modal" data-target="#modalExportBeli" class="btn btn-success ri-file-excel-2-line">Print Excel</button> <a></a> 
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      <!-- </div> -->
      </div>
    </section>

</main>


<div class="modal fade" id="modalCetakJual" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Print Data Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="GET" target="_blank" enctype="multipart/form-data" action="{{ route('print_penjualan') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="date" class="form-control" name="tgl_awal" required>
          </div>
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="date" class="form-control" name="tgl_akhir" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="ri-close-circle-fill"></i> Close</button>
          <button type="submit" class="btn btn-success"><i class="ri-printer-fill"></i> Print</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCetakBeli" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Print Data Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="GET" target="_blank" enctype="multipart/form-data" action="{{ route('print_pembelian') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="date" class="form-control" name="tgl_awal" required>
          </div>
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="date" class="form-control" name="tgl_akhir" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="ri-close-circle-fill"></i> Close</button>
          <button type="submit" class="btn btn-success"><i class="ri-printer-fill"></i> Print</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalExportJual" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Print Data Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="GET" enctype="multipart/form-data" action="{{ route('export_penjualan') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="date" class="form-control" name="tgl_awal" required>
          </div>
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="date" class="form-control" name="tgl_akhir" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="ri-close-circle-fill"></i> Close</button>
          <button type="submit" class="btn btn-success"><i class="ri-printer-fill"></i> Print</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalExportBeli" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Print Data Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="GET" enctype="multipart/form-data" action="{{ route('export_pembelian') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="date" class="form-control" name="tgl_awal" required>
          </div>
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="date" class="form-control" name="tgl_akhir" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="ri-close-circle-fill"></i> Close</button>
          <button type="submit" class="btn btn-success"><i class="ri-printer-fill"></i> Print</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
