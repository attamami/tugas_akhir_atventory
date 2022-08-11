@extends('layout')
@section('title','Manajemen User - ATventory')

@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Manajemen User</h1>
  <nav>
      <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item active">Manajemen User</li> -->
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Data Manajemen User</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              <a href="{{ route('manajemen_user.create') }}" class="btn btn-primary">Tambah Data</a>
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <!-- <th scope="col">Password</th> -->
                  </tr>
                </thead>
                
                @foreach ($manajemen_user as $data)
                  <tr>
                    
                    <td>{{ $data->nama_lengkap}}</td>
                    <td>{{ $data->posisi }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->level }}</td>
                    <!-- <td>{{ $data->password }}</td> -->
                    
                    <td>
                    <!-- <a href="{{ route('manajemen_user.show',$data->id) }}" class="btn btn-info ri-eye-line"></a> -->
                    <a href="{{ route('manajemen_user.edit',$data->id) }}" class="btn btn-success ri-edit-2-line"></a>
                      <form action="{{ route('manajemen_user.destroy',$data->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ri-delete-bin-5-line" onclick="return confirm('Yakin hapus data?')" ></button>
                      </form>
                    </td>
                    
                  </tr>
                @endforeach
              </table>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </section>
</main>
@endsection
