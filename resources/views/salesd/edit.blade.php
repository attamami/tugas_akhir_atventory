@extends('layout')
@section('title','Edit Sales - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Edit Data Sales</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Kontrol Stok</li>    
        <li class="breadcrumb-item">Data Sales</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width: 100%;">
            <div class="card-body">
              <h5 class="card-title">Detail</h5>
              @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <!-- Table with stripped rows -->
                <form action="{{ route('salesd.update',$salesd->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>ID Sales</label>
                                <input name="id_sales" class="form-control" value="{{ $salesd->id_sales }}" readonly>
                                
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Nama Sales</label>
                                <input name="nama_sales" class="form-control" value="{{ $salesd->nama_sales }}">
                                <div class="text-danger">
                                    @error('nama_sales')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input name="telp" class="form-control" value="{{ $salesd->telp }}">
                                <div class="text-danger">
                                    @error('telp')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Area</label>
                                <input name="area" class="form-control" value="{{ $salesd->area }}">
                                <div class="text-danger">
                                    @error('area')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <br>

                            
                            <div class="">
                                <button type="submit" class="btn btn-primary ml-3">Simpan</button> 
                                <a class="btn btn-primary" href="{{ route('salesd.index') }}"> Kembali</a>
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