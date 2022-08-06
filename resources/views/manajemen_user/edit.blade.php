@extends('layout')
@section('title','Manajemen User - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Manajemen User</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Manajemen User</li>    
        <li class="breadcrumb-item active">Edit</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title">Edit</h5>
              @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->
                <form action="{{ route('manajemen_user.update',$manajemen_user->id) }}" method="POST" enctype="multipart/form-data">
                    @dd($manajemen_user->id)
                @csrf
                @method('PUT')
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input name="id_barang" class="form-control" value="{{ $barang->id_barang }}" readonly>
                                
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">
                                <div class="text-danger">
                                    @error('nama_barang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Jenis Barang</label>
                                {{-- <input name="jenis_barang" class="form-control" value="{{ $barang->jenis_barang }}"> --}}
                                <select class="form-control" name="jenis_barang" id="jenis_barang">
                                    <option selected disabled>Pilih Jenis Barang ...</option>
                                    @foreach($jenisbarang as $jenis)
                                        <option data-row="{{$jenis}}" @if (isset($barang)) @if ($barang->jenis_barang == $jenis['nama_jenis']) selected @endif @endif>{{$jenis['nama_jenis']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('id_barang')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="number" name="harga_beli" class="form-control" value="{{ $barang->harga_beli }}">
                                <div class="text-danger">
                                    @error('harga_beli')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" name="harga_jual" class="form-control" value="{{ $barang->harga_jual }}">
                                <div class="text-danger">
                                    @error('harga_jual')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Satuan</label>
                                {{-- <input name="satuan" class="form-control" value="{{ $barang->satuan }}"> --}}
                                <select class="form-control" name="satuan" id="satuan">
                                    <option selected disabled>Pilih Satuan ...</option>
                                    @foreach($satuans as $satuan)
                                        <option data-row="{{$satuan}}" @if (isset($barang)) @if ($barang->satuan == $satuan['nama_satuan']) selected @endif @endif>{{$satuan['nama_satuan']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('satuan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" value="{{ $barang->stok}}" readonly>
                            </div>
                            <br>
                            
                            <div class="">
                                <button type="submit" class="btn btn-primary ml-3">Simpan</button> 
                                <a class="btn btn-primary" href="{{ route('barang.index') }}"> Kembali</a>
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
</main>
@endsection