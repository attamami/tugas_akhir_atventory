@extends('layout')
@section('title','Detail Barang - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Detail Barang</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Barang</li>    
        <li class="breadcrumb-item">Data Barang</li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail</h5>

              <!-- Table with stripped rows -->
              <table class="table table-hover">
                <tr>
                    <td width="150px">ID Barang</td>
                    <td width="90px">:</td>
                    <td>{{ $barang->id_barang }}</td>
                </tr>
                <tr>
                    <td width="100px">Nama Barang</td>
                    <td width="30px">:</td>
                    <td>{{ $barang->nama_barang }}</td>
                </tr>
                <tr>
                    <td width="100px">Jenis Barang</td>
                    <td width="30px">:</td>
                    <td>{{ $barang->jenis_barang }}</td>
                </tr>
                <tr>
                    <td width="100px">Harga Beli</td>
                    <td width="30px">:</td>
                    <td>Rp. {{ number_format($barang->harga_beli) }}</td>
                </tr>
                <tr>
                    <td width="100px">Harga Jual</td>
                    <td width="30px">:</td>
                    <td>Rp. {{ number_format($barang->harga_jual) }}</td>
                </tr>
                <tr>
                    <td width="100px">Satuan</td>
                    <td width="30px">:</td>
                    <td>{{ $barang->satuan }}</td>
                </tr>
                <tr>
                    <td width="100px">Stok</td>
                    <td width="30px">:</td>
                    <td>Rp. {{ number_format($barang->stok) }}</td>
                </tr>
              </table>
              <!-- End Table with stripped rows -->
              <br><a href="{{ route('barang.index') }}" class="btn btn-info ">Kembali</a>

            </div>
          </div>

        </div>
      </div>
    </section>
</main>
@endsection