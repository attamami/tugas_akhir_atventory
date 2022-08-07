@extends('layout')
@section('title','Manajemen User - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Manajemen User</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Manajemen User</li>    
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
              <!-- Table with stripped rows -->
                <form action="{{ route('manajemen_user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><strong>Nama Lengkap</strong></label>
                                <input name="nama_lengkap" class="form-control" value="{{ $user->nama_lengkap }}">
                                <div class="text-danger">
                                    @error('nama_barang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label><strong>Posisi</strong></label>
                                <input name="posisi" class="form-control" value="{{ $user->posisi}}">
                                <div class="text-danger">
                                    @error('posisi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label><strong>Username</strong></label>
                                <input name="username" class="form-control" value="{{ $user->username}}">
                                <div class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label><strong>Email</strong></label>
                                <input name="email" class="form-control" value="{{ $user->email}}">
                                <div class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label><strong>Level</strong></label>
                                {{-- <input name="level" class="form-control" value="{{ $user->level }}"> --}}
                                <select class="form-control" name="level" id="level">
                                    <option selected disabled>Pilih Level (1=Admin, 2=Sales) ...</option>
                                    @foreach($leveluser as $lvl)
                                        <option data-row="{{$lvl}}" @if (isset($user)) @if ($user->level == $lvl['userlevel']) selected @endif @endif>{{$lvl['userlevel']}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('level')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label><strong>Password</strong></label>
                                <input type="password" name="password" class="form-control" value="">
                                <div class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="">
                                <button type="submit" class="btn btn-primary ml-3">Simpan</button> 
                                <a class="btn btn-primary" href="{{ route('manajemen_user.index') }}"> Kembali</a>
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