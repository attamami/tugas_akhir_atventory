@extends('layout')
@section('title','Data Penjualan & Barang Keluar - ATventory')

@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Penjualan & Barang Keluar</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Penjualan & Barang Keluar</li>    
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
              <h5 class="card-title">Penjualan & Barang Keluar</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah Data</a>
              <!-- Table with stripped rows -->
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
                    <th></th>
                  </tr>
                </thead>
                @foreach ($penjualan as $data)
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
                    <td>{{ $data->tgl_jual }}</td>
                    <!-- <td>
                    <a href="{{ route('penjualan.show',$data->id) }}" class="btn btn-info ri-eye-line"></a>
                    <a href="{{ route('penjualan.edit',$data->id) }}" class="btn btn-success ri-edit-2-line"></a>
                      <form action="{{ route('penjualan.destroy',$data->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ri-delete-bin-5-line" onclick="return confirm('Yakin hapus data?')" ></button>
                      </form>
                    </td> -->
                  </tr>
                @endforeach
              </table>
              {!! $penjualan->links() !!}
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      <!-- </div> -->
      </div>
    </section>
</main>
@endsection
