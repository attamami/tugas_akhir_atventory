@extends('layout')
@section('title','Data Stok Barang - ATventory')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Stok Barang</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Barang</li>    
        <li class="breadcrumb-item">Stok</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title">Stok</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{ route('stok.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label><strong>ID Barang</strong></label>
                    {{-- <input name="id_barang" class="form-control" value="{{ $stok->id_barang }}"> --}}
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nama Barang</strong>
                      <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" autocomplete="off" readonly>
                      @error('nama_barang')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <br>

                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
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
                        <strong>Stok</strong>
                        <input type="integer" id="stok" name="stok" class="form-control" placeholder="Masukkan Stok Barang" autocomplete="off">
                        @error('stok')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
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

    <script>
    $(document).ready(function() {
        $(document).on('change', '#id_barang', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            // $('#rating_film').val('active');
            // $('#genre_film').val('keisi');
            $('#nama_barang').val(res.nama_barang);
            $('#satuan').val(res.satuan);
            // $('#tahun_film').val('tahunnya');
        });
    });
    </script>

@endsection