@extends('layout')
@section('title','Hutang Piutang - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Edit Hutang Piutang</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Hutang Piutang</li>    
        <li class="breadcrumb-item">Piutang Dagang</li>
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
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->
                <form action="{{ route('piutang.update',$piutang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>ID Piutang</label>
                                <input name="id_piutang" class="form-control" value="{{ $piutang->id_piutang }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>ID Outlet</label>
                                <input name="id_outlet" class="form-control" value="{{ $piutang->id_outlet }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Nominal Hutang</label>
                                <input type="number" name="nominal_hutang" class="form-control" value="{{ $piutang->nominal_hutang }}" readonly>
                                <div class="text-danger">
                                    @error('nominal_hutang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Nominal Terbayar</label>
                                <input type="number" name="nominal_terbayar" class="form-control" value="{{ $piutang->nominal_terbayar }}">
                                <div class="text-danger">
                                    @error('nominal_terbayar')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Jenis Hutang</label>
                                <input name="jenis_hutang" class="form-control" value="{{ $piutang->jenis_hutang }}" readonly>
                                <div class="text-danger">
                                    @error('jenis_hutang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <!-- <div class="form-group">
                                <label>Jenis Hutang</label>
                                {{-- <input name="jenis_hutang" class="form-control" value="{{ $piutang->jenis_hutang }}" > --}}
                                <select class="form-control" name="jenis_hutang" id="jenis_hutang">
                                    <option selected disabled>Pilih Jenis Hutang ...</option>
                                    @foreach($jenishutangs as $jenishutang)
                                        <option data-row="{{$jenishutang}}" @if (isset($piutang)) @if ($piutang->jenis_hutang == $jenishutang['jenis_hutang']) selected @endif @endif>{{$jenishutang['jenis_hutang']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('jenis_hutang')
                                        {{ $message }}
                                    @enderror
                                </div>
                                </div>
                            <br> -->
                            <div class="form-group">
                                <label>Tanggal Hutang</label>
                                <input type="date" name="tgl_hutang" class="form-control" value="{{ $piutang->tgl_hutang}}" readonly>
                                <div class="text-danger">
                                    @error('tgl_hutang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Tanggal Jatuh Tempo</label>
                                <input type="date" name="jatuh_tempo" class="form-control" value="{{ $piutang->jatuh_tempo}}" readonly>
                                <div class="text-danger">
                                    @error('jatuh_tempo')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Keterangan</label>
                                {{-- <input name="ket_lunas" class="form-control" value="{{ $piutang->ket_lunas }}"> --}}
                                <select class="form-control" name="ket_lunas" id="ket_lunas">
                                    <option selected disabled>Keterangan Lunas/Belum Lunas ...</option>
                                    @foreach($lunashutangs as $lunashutang)
                                        <option data-row="{{$lunashutang}}" @if (isset($piutang)) @if ($piutang->ket_lunas == $lunashutang['jenis_lunas']) selected @endif @endif>{{$lunashutang['jenis_lunas']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('ket_lunas')
                                        {{ $message }}
                                    @enderror
                                </div>
                                </div>
                            <br>

                            <div class="">
                                <button type="submit" class="btn btn-primary ml-3">Simpan</button> 
                                <a class="btn btn-primary" href="{{ route('piutang.index') }}"> Kembali</a>
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