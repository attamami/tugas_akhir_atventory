@extends('layout')
@section('title','Data Pembelian & Barang Masuk - ATventory')

@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Pembelian & Barang Masuk</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Pembelian & Barang Masuk</li>    
        
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Pembelian & Barang Masuk</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              @if(auth()->user()->level=='1')
              <a href="{{ route('pembelian.create') }}" class="btn btn-primary">Tambah Data</a>
              @endif
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Pembelian</th>
                    <th scope="col">Tanggal Beli</th>
                    <th scope="col">Nama Supplier</th>
                    <!-- <th scope="col">ID Barang</th> -->
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    
                  </tr>
                </thead>
                @foreach ($pembelian as $data)
                  <tr>
                    
                    <td>{{ $data->id_pembelian }}</td>
                    <td>{{ $data->tgl_beli }}</td>
                    <td>{{ $data->supplier->nama_supplier }}</td>
                    
                    <td>{{ $data->barang->nama_barang }}</td>
                    <td>{{ $data->barang->jenis_barang }}</td>
                    <td>Rp {{ number_format($data->barang->harga_beli) }}</td>
                    <td>{{ $data->barang->satuan }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->totalhrg) }}</td>
                    
                    <!-- <td>
                    <a href="{{ route('pembelian.show',$data->id) }}" class="btn btn-info ri-eye-line"></a>
                    <a href="{{ route('pembelian.edit',$data->id) }}" class="btn btn-success ri-edit-2-line"></a>
                      <form action="{{ route('pembelian.destroy',$data->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ri-delete-bin-5-line" onclick="return confirm('Yakin hapus data?')" ></button>
                      </form>
                    </td> -->
                  </tr>
                @endforeach
              </table>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      <!-- </div> -->
      </div>
    </section>
</main>
@endsection
