@extends('layout')
@section('title','Data Sales - ATventory')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Sales</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Manajemen Entitas</li>    
        <li class="breadcrumb-item">Data Sales</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title">Data Sales</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{ route('salesd.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Sales</strong>
                        <input type="text" id="id_sales" name="id_sales" class="form-control" placeholder="Masukkan ID Sales" autocomplete="off">
                        @error('id_sales')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
<br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Nama Sales</strong>
                        <input type="text" id="nama_sales" name="nama_sales" class="form-control" placeholder="Masukkan Nama Sales" autocomplete="off">
                        @error('nama_sales')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
<br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>No. Telp</strong>
                        <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukkan No. Telp" autocomplete="off">
                        @error('telp')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Area</strong>
                        <input type="text" id="area" name="area" class="form-control" placeholder="Masukkan Area" autocomplete="off">
                        @error('area')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <br>

            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('salesd.index') }}"> Back</a>
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