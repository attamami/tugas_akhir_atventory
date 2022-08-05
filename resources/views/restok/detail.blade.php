@extends('layout')
@section('title','Detail Pembelian & Barang Masuk - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Detail Data Pembelian & Barang Masuk</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Data Pembelian & Barang Masuk</li>    
        <li class="breadcrumb-item">Re-Stok</li>
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
                    <td width="150px">ID Pembelian</td>
                    <td width="90px">:</td>
                    <td>{{ $restok->id_restok }}</td>
                </tr>
                <tr>
                    <td width="150px">Nama Supplier</td>
                    <td width="90px">:</td>
                    <td>{{ $restok->nama_supplier}}</td>
                </tr>
                <tr>
                    <td width="150px">No. Telepon</td>
                    <td width="90px">:</td>
                    <td>{{ $restok->telp }}</td>
                </tr>
                <tr>
                    <td width="150px">Alamat</td>
                    <td width="90px">:</td>
                    <td>{{ $restok->alamat }}</td>
                </tr>
                <tr>
                    <td width="150px">ID Barang</td>
                    <td width="90px">:</td>
                    <td>{{ $restok->id_barang }}</td>
                </tr>
                <tr>
                    <td width="100px">Nama Barang</td>
                    <td width="30px">:</td>
                    <td>{{ $restok->nama_barang }}</td>
                </tr>
                <tr>
                    <td width="100px">Jenis Barang</td>
                    <td width="30px">:</td>
                    <td>{{ $restok->jenis_barang }}</td>
                </tr>
                <tr>
                    <td width="100px">Harga</td>
                    <td width="30px">:</td>
                    <td>Rp. {{ number_format($restok->harga) }}</td>
                </tr>
                <tr>
                    <td width="100px">Satuan</td>
                    <td width="30px">:</td>
                    <td>{{ $restok->satuan }}</td>
                </tr>
                <tr>
                    <td width="100px">Jumlah</td>
                    <td width="30px">:</td>
                    <td>{{ $restok->jumlah}}</td>
                </tr>
                <tr>
                    <td width="100px">Total Harga</td>
                    <td width="30px">:</td>
                    <td>Rp. {{ number_format($restok->totalhrg) }}</td>
                </tr>
                <tr>
                    <td width="100px">Tanggal Beli</td>
                    <td width="30px">:</td>
                    <td>{{ $restok->tgl_beli}}</td>
                </tr>
              </table>
              <!-- End Table with stripped rows -->
              <br><a href="{{ route('restok.index') }}" class="btn btn-info ">Kembali</a>

            </div>
          </div>

        </div>
      </div>
    </section>
    </main>
@endsection