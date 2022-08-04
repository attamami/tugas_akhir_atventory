@extends('layout')
@section('title','Laporan - ATventory')

@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Laporan</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Laporan Penjualan</li>    
        <!-- <li class="breadcrumb-item active">Re-Stok</li> -->
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Penjualan Keseluruhan</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->

              <form action="{{route('laporan_penjualan.search')}}" method="POST">
                @csrf
                <br>
                <div class="container">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="form-group row">
                                <label for="date">Tanggal Awal</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="tglAwal" name="tglAwal" required>
                                </div>
                                <label for="date">Tanggal Akhir</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="tglAkhir" name="tglAkhir" required>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="ri-search-2-line" title="Search"></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
              </form>
              
              <table class="table datatable" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Penjualan</th>
                    <th scope="col">ID Outlet</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Jual</th>
                  </tr>
                </thead>
                @php($total=0)
                @foreach ($laporan_penjualan as $data)
                  <tr>
                    <td>{{ $data->id_penjualan }}</td>
                    <td>{{ $data->id_outlet }}</td>
                    <td>{{ $data->id_barang }}</td>
                    <td>{{ $data->barang->nama_barang }}</td>
                    <td>{{ $data->barang->jenis_barang }}</td>
                    <td>Rp {{ number_format($data->barang->harga_jual) }}</td>
                    <td>{{ $data->barang->satuan }}</td>
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
              {!! $laporan_penjualan->links() !!}
              <a href="{{ route('laporan_penjualan.create') }}" class="btn btn-danger">Print PDF</a> <a></a> <a href="{{ route('laporan_penjualan.create') }}" class="btn btn-success">Print Excel</a>
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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Penjualan Per Barang</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->
              <table class="table datatable" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Jual</th>
                  </tr>
                </thead>
                @foreach ($laporan_penjualan as $data)
                  <tr>
                    <td>{{ $data->id_barang }}</td>
                    <td>{{ $data->barang->nama_barang }}</td>
                    <td>Rp {{ number_format($data->barang->harga_jual) }}</td>
                    <td>{{ $data->barang->satuan }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->totalhrg) }}</td>
                    <td>{{ $data->tgl_jual }}</td>
                  </tr>
                @endforeach
              </table>
              {!! $laporan_penjualan->links() !!}
              <a href="{{ route('laporan_penjualan.create') }}" class="btn btn-danger">Print PDF</a> <a></a> <a href="{{ route('laporan_penjualan.create') }}" class="btn btn-success">Print Excel</a>
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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Penjualan Per Outlet</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->
              <table class="table datatable" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Outlet</th>
                    <th scope="col">Total Penjualan</th>
                    <th scope="col">Tanggal Jual</th>
                    
                  </tr>
                </thead>
                @foreach ($laporan_penjualan as $data)
                  <tr>
                    <td>{{ $data->id_outlet }}</td>
                    <td>Rp {{ number_format($data->totalhrg) }}</td>
                    <td>{{ $data->tgl_jual }}</td>
                  </tr>
                @endforeach
              </table>
              {!! $laporan_penjualan->links() !!}
              <a href="{{ route('laporan_penjualan.create') }}" class="btn btn-danger">Print PDF</a> <a></a> <a href="{{ route('laporan_penjualan.create') }}" class="btn btn-success">Print Excel</a>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      <!-- </div> -->
      </div>
    </section>
</main>

@endsection
