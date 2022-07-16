@extends('layout')
@section('title','Data Supplier - ATventory')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Supplier</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Manajemen Entitas</li>    
        <li class="breadcrumb-item">Data Supplier</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title">Data Supplier</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Supplier</strong>
                        <input type="text" id="id_supplier" name="id_supplier" class="form-control" placeholder="Masukkan ID Supplier" autocomplete="off">
                        @error('id_supplier')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
<br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Nama Supplier</strong>
                        <input type="text" id="nama_supplier" name="nama_supplier" class="form-control" placeholder="Masukkan Nama Supplier" autocomplete="off">
                        @error('nama_supplier')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
<br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>No. Telp</strong>
                        <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukkan No. Telepon" autocomplete="off">
                        @error('telp')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Alamat</strong>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat" autocomplete="off">
                        @error('alamat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <br>

            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('supplier.index') }}"> Back</a>
            </div>
                
            </div>
        </form>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


@endsection