@extends('layout')
@section('title','Edit Supplier - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Edit Data Supplier</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Kontrol Stok</li>    
        <li class="breadcrumb-item">Data Supplier</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title">Detail</h5>
              @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->
                <form action="{{ route('supplier.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>ID Supplier</label>
                                <input name="id_supplier" class="form-control" value="{{ $supplier->id_supplier }}" readonly>
                                
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input name="nama_supplier" class="form-control" value="{{ $supplier->nama_supplier }}">
                                <div class="text-danger">
                                    @error('nama_supplier')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input name="telp" class="form-control" value="{{ $supplier->telp }}">
                                <div class="text-danger">
                                    @error('telp')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input name="alamat" class="form-control" value="{{ $supplier->alamat }}">
                                <div class="text-danger">
                                    @error('alamat')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <br>

                            
                            <div class="">
                                <button type="submit" class="btn btn-primary ml-3">Simpan</button> 
                                <a class="btn btn-primary" href="{{ route('supplier.index') }}"> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection