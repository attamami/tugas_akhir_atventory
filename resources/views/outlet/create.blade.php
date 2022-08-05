@extends('layout')
@section('title','Data Outlet - ATventory')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Outlet</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Manajemen Entitas</li>    
        <li class="breadcrumb-item">Data Outlet</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title">Data Outlet</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{ route('outlet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Outlet</strong>
                        <input type="text" id="id_outlet" name="id_outlet" class="form-control" placeholder="Masukkan ID Outlet" autocomplete="off">
                        @error('id_outlet')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
<br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Nama Outlet</strong>
                        <input type="text" id="nama_outlet" name="nama_outlet" class="form-control" placeholder="Masukkan Nama Outlet" autocomplete="off">
                        @error('nama_outlet')
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
                <a class="btn btn-primary" href="{{ route('outlet.index') }}"> Back</a>
            </div>
                
            </div>
        </form>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main>
@endsection