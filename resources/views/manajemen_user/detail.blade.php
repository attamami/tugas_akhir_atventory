@extends('layout')
@section('title','Manajemen User - ATventory')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Manajemen User</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Manajemen User</li>    
        <li class="breadcrumb-item active">Detail</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail</h5>

              <!-- Table with stripped rows -->
              <table class="table table-hover">
                <tr>
                    <td width="150px">Nama Lengkap</td>
                    <td width="90px">:</td>
                    <td>{{ $user->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td width="100px">Posisi</td>
                    <td width="30px">:</td>
                    <td>{{ $user->posisi }}</td>
                </tr>
                <tr>
                    <td width="100px">Username</td>
                    <td width="30px">:</td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td width="100px">Email</td>
                    <td width="30px">:</td>
                    <td>{{$user->email }}</td>
                </tr>
                <tr>
                    <td width="100px">Level</td>
                    <td width="30px">:</td>
                    <td>{{ $user->level }}</td>
                </tr>
                <tr>
                    <td width="100px">Password</td>
                    <td width="30px">:</td>
                    <td>{{ $user->password }}</td>
                </tr>
                
              </table>
              <!-- End Table with stripped rows -->
              <br><a href="{{ route('manajemen_user.index') }}" class="btn btn-primary ">Kembali</a>

            </div>
          </div>

        </div>
      </div>
    </section>
</main>
@endsection