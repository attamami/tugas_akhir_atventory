@extends('layout')
@section('title','Data Pembelian & Barang Masuk - ATventory')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Pembelian & Barang Masuk</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Pembelian & Barang Masuk</li>    
        <li class="breadcrumb-item">Re-Stok</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body" >
              <h5 class="card-title">Pembelian & Barang Masuk</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{ route('restok.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Pembelian</strong>
                        <input type="text" id="id_restok" name="id_restok" class="form-control" placeholder="Masukkan ID Pembelian" autocomplete="off">
                        @error('id_restok')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label><strong></strong></label>
                    {{-- <input name="nama_supplier" class="form-control" value="{{ $brgbaru->nama_supplier }}"> --}}
                    <select class="form-control" name="nama_supplier" id="nama_supplier">
                        <option selected disabled>Pilih Nama Supplier ...</option>
                        @foreach($suppliers as $supplier)
                            <option data-row="{{$supplier}}" value="{{$supplier->nama_supplier}}">{{$supplier->nama_supplier}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('nama_supplier')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
<br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>No. Telepon</strong>
                      <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukkan No. Telepon" autocomplete="off" readonly>
                      @error('telp')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <br>

                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Alamat</strong>
                      <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat" autocomplete="off" readonly>
                      @error('alamat')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <br>
                <div class="form-group">
                    <label><strong></strong></label>
                    {{-- <input name="id_barang" class="form-control" value="{{ $restok->id_barang }}"> --}}
                    <select class="form-control" name="id_barang" id="id_barang">
                        <option selected disabled>Pilih ID Barang ...</option>
                        @foreach($barangs as $barang)
                            <option data-row="{{$barang}}" value="{{$barang->id_barang}}">{{$barang->id_barang}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('id_barang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>
                alamat
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Nama Barang</strong>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" autocomplete="off" readonly>
                        @error('nama_barang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Jenis Barang</strong>
                        <input type="text" id="jenis_barang" name="jenis_barang" class="form-control" placeholder="Masukkan Jenis Barang" autocomplete="off" readonly>
                        @error('jenis_barang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Harga</strong>
                        <input type="number" id="harga" name="harga" onkeyup="sum();" class="form-control" placeholder="Masukkan Harga" autocomplete="off" readonly>
                        @error('harga')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Satuan</strong>
                        <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Masukkan Satuan" autocomplete="off" readonly>
                        @error('satuan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="row ml-auto">
                    <div class="col">
                        <strong>Jumlah</strong>
                        <input type="number" id="jumlah" name="jumlah" onkeyup="sum();" class="form-control" placeholder="Masukkan Jumlah Barang" autocomplete="off">
                        @error('jumlah')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Total Harga</strong>
                        <input type="number" id="totalhrg" name="totalhrg" onkeyup="sum();" class="form-control" placeholder="Masukkan Total Harga" autocomplete="off" readonly>
                        @error('totalhrg')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Tanggal Beli</strong>
                        <input type="date" id="tgl_beli" name="tgl_beli" class="form-control" placeholder="Masukkan Tanggal Beli" autocomplete="off" value="{{ date('Y-m-d', strtotime("+0 day")) }}">
                        @error('tgl_beli')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('brgbaru.index') }}"> Back</a>
            </div>
                
            </div>
        </form>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <script>
    $(document).ready(function() {
        $(document).on('change', '#nama_supplier', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#telp').val(res.telp);
            $('#alamat').val(res.alamat);
        });
    });
    </script>
    <!-- <script>
        var stokbaru = $(stoks.stok) + $('#jumlah').val();
    </script> -->
    <script>
    $(document).ready(function() {
        $(document).on('change', '#id_barang', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#nama_barang').val(res.nama_barang);
            $('#jenis_barang').val(res.jenis_barang);
            $('#harga').val(res.harga);
            $('#satuan').val(res.satuan);
        });
    });
    </script>
    <script>
        function sum(){
		var txtFirstNumberValue = document.getElementById('harga').value;
		var txtSecondNumberValue = document.getElementById('jumlah').value;
		var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
		if (!isNaN(result)){
			document.getElementById('totalhrg').value=result;
		}
	}
    </script>

@endsection