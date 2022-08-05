@extends('layout')
@section('title','Data Barang - ATventory')

@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Barang</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Barang</li>    
        <li class="breadcrumb-item active">Data Barang</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <div class="scrolling-wrapper">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Barang</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif

              @if(auth()->user()->level=='1')
              <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Data</a>
              @endif
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Stok</th>
                  </tr>
                </thead>
                @foreach ($barang as $data)
                  <tr>
                    
                    <td>{{ $data->id_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>{{ $data->jenis_barang }}</td>
                    <td>Rp {{ number_format($data->harga_beli) }}</td>
                    <td>Rp {{ number_format($data->harga_jual) }}</td>
                    <td>{{ $data->satuan }}</td>
                    <td>{{ $data->stok }}</td>
                    
                    @if(auth()->user()->level=='1')
                    <td>
                    <!-- <a href="{{ route('barang.show',$data->id) }}" class="btn btn-info ri-eye-line"></a> -->
                    <a href="{{ route('barang.edit',$data->id) }}" class="btn btn-success ri-edit-2-line"></a>
                      <form action="{{ route('barang.destroy',$data->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ri-delete-bin-5-line" onclick="return confirm('Yakin hapus data?')" ></button>
                      </form>
                    </td>
                    @endif
                  </tr>
                @endforeach
              </table>
              {!! $barang->links() !!}
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
</main>
@endsection
