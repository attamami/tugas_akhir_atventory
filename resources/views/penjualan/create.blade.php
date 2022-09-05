@extends('layout')
@section('title','Data Penjualan & Barang Keluar - ATventory')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                        <input type="text" id="id_penjualan" readonly value="{{'PJ'.$kd}}" name="id_penjualan" class="form-control" placeholder="Masukkan ID Penjualan" autocomplete="off">
                        @error('id_penjualan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label><strong>Nama Sales</strong></label>
                    
                    <select class="form-control" name="nama_sales" id="nama_sales">
                        <option selected disabled>Masukkan Nama Sales ...</option>
                        @foreach($salesds as $s)
                            <option data-row="{{$s}}" value="{{$s->nama_sales}}">{{$s->nama_sales}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('nama_sales')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                  <div class="form-group">
                      <strong>ID Sales</strong>
                      <input type="text" id="id_sales" name="id_sales" class="form-control" autocomplete="off" readonly> 
                      
                      @error('id_sales')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>

                <div class="form-group">
                    <label><strong>Nama Outlet</strong></label>
                    
                    <select class="form-control" name="nama_outlet" id="nama_outlet">
                        <option selected disabled>Masukkan Nama Outlet ...</option>
                        @foreach($outlets as $outlet)
                            <option data-row="{{$outlet}}" value="{{$outlet->nama_outlet}}">{{$outlet->nama_outlet}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('nama_outlet')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                  <div class="form-group">
                      <strong>ID Outlet</strong>
                      <input type="text" id="id_outlet" name="id_outlet" class="form-control" autocomplete="off" readonly>
                      @error('id_outlet')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                
                <div class="form-group">
                    <label><strong>Nama Barang</strong></label>
                    
                    <select class="form-control" name="nama_barang" id="nama_barang">
                        <option selected disabled>Masukkan Nama Barang ...</option>
                        @foreach($barangs as $barang)
                            <option data-row="{{$barang}}" value="{{$barang->nama_barang}}">{{$barang->nama_barang}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('nama_barang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>
                
                <div class="row ml-auto" style="display: none;">
                    <div class="col">
                        <strong>ID Barang</strong>
                        <input type="text" id="id_barang" name="id_barang" class="form-control"  autocomplete="off" readonly>
                        @error('id_barang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Jenis Barang</strong>
                        <input type="text" id="jenis_barang" name="jenis_barang" class="form-control" autocomplete="off" readonly>
                        @error('jenis_barang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Satuan</strong>
                        <input type="text" id="satuan" name="satuan" class="form-control" autocomplete="off" readonly>
                        @error('satuan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Harga Per Satuan</strong>
                        <input type="number" id="harga_jual" name="harga_jual" onkeyup="sum();" class="form-control" autocomplete="off" readonly>
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
        $(document).on('change', '#nama_outlet', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#id_outlet').val(res.id_outlet);
            // $('#alamat').val(res.alamat);
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $(document).on('change', '#nama_sales', function(){
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#id_sales').val(res.id_sales);
            // $('#alamat').val(res.alamat);
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $(document).on('change', '#nama_barang', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#id_barang').val(res.id_barang);
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
    <script>
        $(document).ready(function() {
        $('#nama_sales').select2();
        });

        $(document).ready(function() {
        $('#nama_outlet').select2();
        });

        $(document).ready(function() {
        $('#nama_barang').select2();
        });
    </script>
</main>
@endsection