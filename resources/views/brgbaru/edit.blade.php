@extends('layout')
@section('title','Edit Data Pembelian & Barang Masuk - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Edit Data Pembelian & Barang Masuk</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Data Pembelian & Barang Masuk</li>    
        <li class="breadcrumb-item">Barang Baru</li>
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
                <form action="{{ route('brgbaru.update',$brgbaru->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>ID Pembelian</label>
                                <input name="id_beli" class="form-control" value="{{ $brgbaru->id_beli }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>ID Supplier</label>
                                {{-- <input name="id_supplier" class="form-control" value="{{ $brgbaru->id_supplier }}"> --}}
                                <select class="form-control" name="id_supplier" id="id_supplier">
                                    <option selected disabled>Pilih ID Supplier ...</option>
                                    @foreach($suppliers as $supplier)
                                        <option data-row="{{$supplier}}" @if (isset($brgbaru)) @if ($brgbaru->id_supplier == $supplier['id_supplier']) selected @endif @endif>{{$supplier['id_supplier']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('jenis_barang')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input name="id_barang" class="form-control" value="{{ $brgbaru->id_barang }}" readonly>
                                <div class="text-danger">
                                    @error('id_barang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <!-- <div class="form-group">
                                <label>Nama Barang</label>
                                <input name="nama_barang" class="form-control" value="{{ $brgbaru->nama_barang }}">
                                <div class="text-danger">
                                    @error('nama_barang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Jenis Barang</label>
                                {{-- <input name="jenis_barang" class="form-control" value="{{ $brgbaru->jenis_barang }}"> --}}
                                <select class="form-control" name="jenis_barang" id="jenis_barang">
                                    <option selected disabled>Pilih Jenis Barang ...</option>
                                    @foreach($jenisbarang as $jenis)
                                        <option data-row="{{$jenis}}" @if (isset($brgbaru)) @if ($brgbaru->jenis_barang == $jenis['nama_jenis']) selected @endif @endif>{{$jenis['nama_jenis']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('jenis_barang')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Harga</label>
                                <input name="harga" class="form-control" value="{{ $brgbaru->harga }}">
                                <div class="text-danger">
                                    @error('harga')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label>Satuan</label>
                                {{-- <input name="satuan" class="form-control" value="{{ $brgbaru->satuan }}"> --}}
                                <select class="form-control" name="satuan" id="satuan">
                                    <option selected disabled>Pilih Satuan ...</option>
                                    @foreach($satuans as $satuan)
                                        <option data-row="{{$satuan}}" @if (isset($brgbaru)) @if ($brgbaru->satuan == $satuan['nama_satuan']) selected @endif @endif>{{$satuan['nama_satuan']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('satuan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br> -->
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input name="jumlah" class="form-control" value="{{ $brgbaru->jumlah}}">
                                <div class="text-danger">
                                    @error('jumlah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Total Harga</label>
                                <input name="totalhrg" class="form-control" value="{{ $brgbaru->totalhrg }}">
                                <div class="text-danger">
                                    @error('totalhrg')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Tanggal Beli</label>
                                <input type="date" name="tgl_beli" class="form-control" value="{{ $brgbaru->tgl_beli}}">
                                <div class="text-danger">
                                    @error('harga')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="">
                                <button type="submit" class="btn btn-primary ml-3">Simpan</button> 
                                <a class="btn btn-primary" href="{{ route('brgbaru.index') }}"> Kembali</a>
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