@extends('layout')
@section('title','Data Barang - ATventory')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Barang</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Barang</li>    
        <li class="breadcrumb-item">Data Barang</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Data Barang</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Barang</strong>
                        <input type="text" id="id_barang" name="id_barang" class="form-control" placeholder="Masukkan ID Barang" autocomplete="off">
                        @error('id_barang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
<br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Nama Barang</strong>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" autocomplete="off">
                        @error('nama_barang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
<br>
                <div class="form-group">
                    <label> <strong>Jenis Barang</strong></label>
                    {{-- <input name="jenis_barang" class="form-control" value="{{ $barang->jenis_barang }}"> --}}
                    <select class="form-control" name="jenis_barang" id="jenis_barang">
                        <option selected disabled>Pilih Jenis Barang ...</option>
                        @foreach($jenisbarang as $jenis)
                            <option data-row="{{$jenis}}" value="{{$jenis->nama_jenis}}">{{$jenis->nama_jenis}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('jenis_barang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <br>

                <div class="row ml-auto">
                    <div class="col">
                        <strong>Harga</strong>
                        <input type="text" id="harga" name="harga" class="form-control" placeholder="Masukkan Harga Barang" autocomplete="off">
                        @error('harga')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <br>
            <div class="form-group">
                    <label> <strong>Satuan</strong></label>
                    {{-- <input name="satuan" class="form-control" value="{{ $barang->satuan }}"> --}}
                    <select class="form-control" name="satuan" id="satuan">
                        <option selected disabled>Pilih Satuan ...</option>
                        @foreach($satuans as $satuan)
                            <option data-row="{{$satuan}}" value="{{$satuan->nama_satuan}}">{{$satuan->nama_satuan}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('satuan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>

            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('barang.index') }}"> Back</a>
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