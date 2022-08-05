@extends('layout')
@section('title','Data Penjualan & Barang Keluar - ATventory')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Penjualan & Barang Keluar</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Penjualan & Barang Keluar</li>    
        <!-- <li class="breadcrumb-item">Re-Stok</li> -->
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body" >
              <h5 class="card-title">Penjualan & Barang Keluar</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @elseif(($message = Session::get('error')))
                    <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                    </div>
                @endif

            <form action="{{ route('penjualan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Penjualan</strong>
                        <input type="text" id="id_penjualan" name="id_penjualan" class="form-control" placeholder="Masukkan ID Penjualan" autocomplete="off">
                        @error('id_penjualan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label><strong></strong></label>
                    {{-- <input name="id_outlet" class="form-control" value="{{ $penjualan->id_outlet }}"> --}}
                    <select class="form-control" name="id_outlet" id="id_outlet">
                        <option selected disabled>Pilih ID Outlet ...</option>
                        @foreach($outlets as $outlet)
                            <option data-row="{{$outlet}}" value="{{$outlet->id_outlet}}">{{$outlet->id_outlet}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('id_outlet')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
<br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nama Outlet</strong>
                      <input type="text" id="nama_outlet" name="nama_outlet" class="form-control" placeholder="Masukkan Nama Outlet" autocomplete="off" readonly>
                      @error('nama_outlet')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <br>
                <div class="form-group">
                    <label><strong>ID Barang</strong></label>
                    {{-- <input name="id_barang" class="form-control" value="{{ $penjualan->id_barang }}"> --}}
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
                        <strong>Harga Per Satuan</strong>
                        <input type="number" id="harga_jual" name="harga_jual" onkeyup="sum();" class="form-control" placeholder="Masukkan Harga" autocomplete="off" readonly>
                        @error('harga_beli')
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
                        <input type="number" id="totalhrg" name="totalhrg" onkeyup="sum();" class="form-control" placeholder="Masukkan Total Harga" autocomplete="off">
                        @error('totalhrg')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Tanggal Jual</strong>
                        <input type="date" id="tgl_jual" name="tgl_jual" class="form-control" placeholder="Masukkan Tanggal Jual" autocomplete="off" value="{{ date('Y-m-d', strtotime("+0 day")) }}">
                        @error('tgl_jual')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <br>
            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('penjualan.index') }}"> Back</a>
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
        $(document).on('change', '#id_outlet', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#nama_outlet').val(res.nama_outlet);
            // $('#alamat').val(res.alamat);
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
            $('#harga_jual').val(res.harga_jual);
            $('#satuan').val(res.satuan);
        });
    });
    </script>
    <script>
        function sum(){
		var txtFirstNumberValue = document.getElementById('harga_jual').value;
		var txtSecondNumberValue = document.getElementById('jumlah').value;
		var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
		if (!isNaN(result)){
			document.getElementById('totalhrg').value=result;
		}
	}
    </script>
</main>
@endsection