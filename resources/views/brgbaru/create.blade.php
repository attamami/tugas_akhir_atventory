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
        <li class="breadcrumb-item">Barang Baru</li>
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
            <form action="{{ route('brgbaru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Pembelian</strong>
                        <input type="text" id="id_beli" name="id_beli" class="form-control" placeholder="Masukkan ID Pembelian" autocomplete="off">
                        @error('id_beli')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label><strong>ID Supplier</strong></label>
                    {{-- <input name="id_supplier" class="form-control" value="{{ $brgbaru->id_supplier }}"> --}}
                    <select class="form-control" name="id_supplier" id="id_supplier">
                        <option selected disabled>Pilih ID Supplier ...</option>
                        @foreach($suppliers as $supplier)
                            <option data-row="{{$supplier}}" value="{{$supplier->id_supplier}}">{{$supplier->id_supplier}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('id_supplier')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
<br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nama Supplier</strong>
                      <input type="text" id="nama_supplier" name="nama_supplier" class="form-control" autocomplete="off" readonly>
                      <!-- @error('nama_supplier')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror -->
                  </div>
                </div>
                <br>
<!-- 
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Alamat</strong>
                      <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat" autocomplete="off" readonly>
                      @error('alamat')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <br> -->

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
                    {{-- <input name="jenis_barang" class="form-control" value="{{ $brgbaru->jenis_barang }}"> --}}
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
                <div class="form-group">
                    <label> <strong>Satuan</strong></label>
                    {{-- <input name="satuan" class="form-control" value="{{ $brgbaru->satuan }}"> --}}
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
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Harga Per Satuan</strong>
                        <input type="number" id="harga_beli" name="harga_beli" onkeyup="sum();" class="form-control" placeholder="Masukkan Harga Barang" autocomplete="off">
                        @error('harga_beli')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="row ml-auto">
                    <div class="col">
                        <strong>Harga Jual</strong>
                        <input type="number" id="harga_jual" name="harga_jual" onkeyup="sum();" class="form-control" placeholder="Masukkan Harga Barang" autocomplete="off" >
                        @error('harga_jual')
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
                        <input type="number" id="totalhrg" name="totalhrg" onkeyup="sum();" class="form-control" placeholder="Masukkan Total Harga" autocomplete="off" >
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
        $(document).on('change', '#id_supplier', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            // $('#rating_film').val('active');
            // $('#genre_film').val('keisi');
            $('#nama_supplier').val(res.nama_supplier);
            // $('#alamat').val(res.alamat);
            // $('#tahun_film').val('tahunnya');
        });
    });
    </script>
    <script>
        function sum(){
		var txtFirstNumberValue = document.getElementById('harga_beli').value;
		var txtSecondNumberValue = document.getElementById('jumlah').value;
		var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
		if (!isNaN(result)){
			document.getElementById('totalhrg').value=result;
		}
        var result2 = parseInt(txtFirstNumberValue) + (parseInt(txtFirstNumberValue)*0.05);
		if (!isNaN(result2)){
			document.getElementById('harga_jual').value=result2;
		}
	}
    </script>
    <!-- <script>
        function sum(){
		var txtFirstNumberValue = document.getElementById('harga_beli').value;
		// var txtSecondNumberValue = document.getElementById('jumlah').value;
		var result = parseInt(txtFirstNumberValue) + (parseInt(txtFirstNumberValue)*0.05);
		if (!isNaN(result)){
			document.getElementById('harga_jual').value=result;
		}
	}
    </script> -->

@endsection