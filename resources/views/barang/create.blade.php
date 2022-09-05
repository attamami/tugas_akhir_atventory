@extends('layout')
@section('title','Data Barang - ATventory')
@section('content')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                        <input type="text" id="id_barang" name="id_barang" readonly value="{{'BRG'.$kd}}" class="form-control" placeholder="Masukkan ID Barang" autocomplete="off">
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
                <div class="row-ml-auto">
                    <div class="col">
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
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <br>

                <div class="row ml-auto">
                    <div class="col-md-8">
                        <strong>Harga Beli</strong>
                        <input type="number" id="harga_beli" name="harga_beli" onkeyup="sum();" class="form-control" placeholder="Masukkan Harga Barang" autocomplete="off">
                        @error('harga_beli')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <strong>Persentase Penjualan %</strong>
                        <input type="number" id="persen" name="persen" onkeyup="sum();" class="form-control" placeholder="Masukkan Persentase Penjualan" autocomplete="off">
                    </div>
                </div>
                <br>
                
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Harga Jual</strong>
                        <input type="number" id="harga_jual" name="harga_jual" onkeyup="sum();" class="form-control" placeholder="Masukkan Harga Barang" autocomplete="off" readonly>
                        @error('harga')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row ml-auto">
                    <label> <strong>Satuan</strong></label>
                        <div class="col-md-11">
                            
                            {{-- <input name="satuan" class="form-control" value="{{ $barang->satuan }}"> --}}
                            <select class="form-control" name="satuan" id="satuan">
                                <option selected disabled>Pilih Satuan ...</option>
                                @foreach($satuans as $satuan)
                                    <option data-row="{{$satuan}}" value="{{$satuan->nama_satuan}}">{{$satuan->nama_satuan}}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('satuan')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <a class="btn btn-primary ri-add-fill" data-toggle="modal" data-target="#newSatuan"></a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group" style="display: none;">
                    <strong><label>Stok</label></strong>
                    <input type="number" name="stok" class="form-control" value="0" readonly>
                </div>
                <!-- <br> -->
                <!-- <div class="row ml-auto">
                    <div class="col">
                        <strong>Stok</strong>
                        <input type="number" id="stok" name="stok" class="form-control" placeholder="Masukkan Stok Barang" autocomplete="off">
                        @error('stok')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                -->

            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('barang.index') }}">Back</a>
            </div>
                
            </div>
        </form>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <div class="modal fade" id="newSatuan" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalShortTitle">Tambah Satuan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="{{ route('satuan.store') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <strong><label>Nama Satuan</label></strong>
            <input type="text" class="form-control" name="nama_satuan" placeholder="Masukkan Nama Satuan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="ri-save-3-line"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <script>
        function sum(){
		var txtFirstNumberValue = document.getElementById('harga_beli').value;
        var txtSecondNumberValue = document.getElementById('persen').value;
        var result = parseInt(txtFirstNumberValue) + (parseInt(txtFirstNumberValue) * (parseInt(txtSecondNumberValue)/100));
		if (!isNaN(result)){
			document.getElementById('harga_jual').value=result;
		}
        
	}
    </script>
    <script>
        $(document).ready(function() {
        $('#jenis_barang').select2();
        });

        $(document).ready(function() {
        $('#satuan').select2();
        });
    </script>
</main>
@endsection