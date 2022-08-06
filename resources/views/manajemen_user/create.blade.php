@extends('layout')
@section('title','Manajemen User - ATventory')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Barang</h1>
  <nav>
      <ol class="breadcrumb">  
        <li class="breadcrumb-item">Manajemen User</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Data Manajemen User</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{ route('manajemen_user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Nama Lengkap</strong>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" autocomplete="off">
                        @error('nama_lengkap')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Posisi</strong>
                        <input type="text" id="posisi" name="posisi" class="form-control" placeholder="Masukkan Posisi User" autocomplete="off">
                        @error('posisi')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Username</strong>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" autocomplete="off">
                        @error('username')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Email</strong>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email" autocomplete="off">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label> <strong>Level User</strong></label>
                    {{-- <input name="level" class="form-control" value="{{ $manajemen_user->level }}"> --}}
                    <select class="form-control" name="level" id="level">
                        <option selected disabled>Pilih Level User ...</option>
                        @foreach($leveluser as $lvl)
                            <option data-row="{{$lvl}}" value="{{$lvl->userlevel}}">{{$lvl->userlevel}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('level')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Keterangan Level</strong>
                        <input type="text" id="namalevel" name="namalevel" class="form-control" placeholder="Keterangan Level User" autocomplete="off" readonly>
                        @error('nama_level')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row ml-auto">
                    <div class="col">
                        <strong>Password</strong>
                        <input type="text" id="password" name="password" class="form-control" placeholder="Password User" autocomplete="off">
                        @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

            <div class="">
                <button type="submit" class="btn btn-primary ml-3">Submit</button> 
                <a class="btn btn-primary" href="{{ route('manajemen_user.index') }}"> Back</a>
            </div>
                
            </div>
        </form>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main>
<script>
    $(document).ready(function() {
        $(document).on('change', '#level', function(){
            // var res   =  $(this).find(':selected').data('row');
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#namalevel').val(res.namalevel);
        });
    });
    </script>
@endsection