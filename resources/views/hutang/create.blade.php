@extends('layout')
@section('title','Hutang Piutang - ATventory')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Hutang Piutang</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Hutang Piutang</li>    
        <li class="breadcrumb-item">Hutang Dagang</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body" >
              <h5 class="card-title">Hutang Piutang</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @elseif(($message = Session::get('error')))
                    <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                    </div>
                @endif

            <form action="{{ route('hutang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
            <div class="row ml-auto">
                    <div class="col">
                        <strong>ID Hutang</strong>
                        <input type="text" id="id_hutang" readonly value="{{'HTG'.$kd}}" name="id_hutang" class="form-control" placeholder="Masukkan ID Hutang" autocomplete="off">
                        @error('id_hutang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label><strong>Nama Supplier</strong></label>
                    
                    <select class="form-control" name="nama_supplier" id="nama_supplier">
                        <option selected disabled>Masukkan Nama Supplier ...</option>
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
                <div class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                  <div class="form-group">
                      <strong>ID Supplier</strong>
                      <input type="text" id="id_supplier" name="id_supplier" class="form-control" readonly>
                      @error('id_supplier')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nominal Hutang</strong>
                      <input type="number" id="nominal_hutang" name="nominal_hutang" class="form-control" placeholder="Masukkan Nominal Hutang">
                      @error('nominal_hutang')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <br>

                <div class="row ml-auto">
                    <div class="col">
                        <strong>Nominal Terbayar</strong>
                        <input type="number" id="nominal_terbayar" name="nominal_terbayar" class="form-control" placeholder="Masukkan Nominal Terbayar" autocomplete="off">
                        @error('nominal_terbayar')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label><strong>Jenis Hutang</strong></label>
                    {{-- <input name="jenis_hutang" class="form-control" value="{{ $hutang->jenis_hutang }}"> --}}
                    <select class="form-control" name="jenis_hutang" id="jenis_hutang">
                        <option selected disabled>Pilih Jenis Hutang ...</option>
                        @foreach($jenishutangs as $jenishutang)
                            <option data-row="{{$jenishutang}}" value="{{$jenishutang->jenis_hutang}}">{{$jenishutang->jenis_hutang}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('jenis_hutang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Tanggal Hutang</strong>
                        <input type="date" id="tgl_hutang" name="tgl_hutang" class="form-control" placeholder="Masukkan Tanggal Hutang">
                        @error('tgl_hutang')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Tanggal Jatuh Tempo</strong>
                        <input type="date" id="jatuh_tempo" name="jatuh_tempo" class="form-control" placeholder="Masukkan Tanggal Jatuh Tempo" autocomplete="off">
                        @error('jatuh_tempo')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label><strong>Keterangan</strong></label>
                    {{-- <input name="ket_lunas" class="form-control" value="{{ $hutang->ket_lunas }}"> --}}
                    <select class="form-control" name="ket_lunas" id="ket_lunas">
                        <option selected disabled>Keterangan Lunas/Belum Lunas ...</option>
                        @foreach($lunashutangs as $lunashutang)
                            <option data-row="{{$lunashutang}}" value="{{$lunashutang->jenis_lunas}}">{{$lunashutang->jenis_lunas}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('ket_hutang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>


            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('hutang.index') }}"> Back</a>
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
            
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#id_supplier').val(res.id_supplier);
        });
    });
    </script>
   <script>
        $(document).ready(function() {
        $('#nama_supplier').select2();
        });
    </script>
</main>
@endsection