@extends('layout')
@section('title','Data Outlet - ATventory')

@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Outlet</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Manajemen Entitas</li>    
        <li class="breadcrumb-item active">Data Outlet</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Data Outlet</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
              @if(auth()->user()->level=='1')
              <a href="{{ route('outlet.create') }}" class="btn btn-primary">Tambah Data</a>
              @endif
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Outlet</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Alamat</th>
                  </tr>
                </thead>
                @foreach ($outlet as $data)
                  <tr>
                    
                    <td>{{ $data->id_outlet }}</td>
                    <td>{{ $data->nama_outlet }}</td>
                    <td>{{ $data->telp }}</td>
                    <td>{{ $data->alamat}}</td>
                    @if(auth()->user()->level=='1')
                    <td>
                    <a href="{{ route('outlet.edit',$data->id) }}" class="btn btn-success ri-edit-2-line"></a>
                      <form action="{{ route('outlet.destroy',$data->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ri-delete-bin-5-line" onclick="return confirm('Yakin hapus data?')" ></button>
                      </form>
                    </td>
                    @endif
                  </tr>
                @endforeach
              </table>
              
              <!-- End Table with stripped rows -->

            </div>
          </div>

        <!-- </div> -->
        </div>
      </div>
    </section>
</main>
@endsection
