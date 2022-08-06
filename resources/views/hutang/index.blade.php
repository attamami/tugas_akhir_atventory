@extends('layout')
@section('title','Hutang Piutang - ATventory')

@section('content')
    
<main id="main" class="main">

<div class="pagetitle">
  <h1>Hutang Piutang</h1>
  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Hutang Piutang</li>    
        <li class="breadcrumb-item active">Hutang Dagang</li>
      </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Hutang Piutang</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @elseif($message = Session::get('error'))
                    <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                    </div>
                @endif
                
              <a href="{{ route('hutang.create') }}" class="btn btn-primary">Tambah Data</a>
              <!-- Table with stripped rows -->
              <table class="table datatable" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Hutang</th>
                    <th scope="col">ID Supplier</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Nominal Hutang</th>
                    <th scope="col">Nominal Terbayar</th>
                    <th scope="col">Jenis Hutang</th>
                    <th scope="col">Tanggal Hutang</th>
                    <th scope="col">Tanggal Jatuh Tempo</th>
                    <th scope="col">Keterangan</th>
                    <th></th>
                  </tr>
                </thead>
                @foreach ($hutang as $data)
                  <tr>
                    <td>{{ $data->id_hutang }}</td>
                    <td>{{ $data->id_supplier }}</td>
                    <td>{{ $data->supplier->nama_supplier }}</td>
                    <td>Rp {{ number_format($data->nominal_hutang) }}</td>
                    <td>Rp {{ number_format($data->nominal_terbayar) }}</td>
                    <td>{{ $data->jenis_hutang}}</td>
                    <td>{{ $data->tgl_hutang }}</td>
                    <td>{{ $data->jatuh_tempo }}</td>
                    <td>{{ $data->ket_lunas }}</td>
                    <td>
                    <!-- <a href="{{ route('piutang.show',$data->id) }}" class="btn btn-info ri-eye-line"></a> -->
                    <a href="{{ route('hutang.edit',$data->id) }}" class="btn btn-success ri-edit-2-line"></a>
                      <form action="{{ route('hutang.destroy',$data->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ri-delete-bin-5-line" onclick="return confirm('Yakin hapus data?')" ></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </table>
              {!! $hutang->links() !!}
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      <!-- </div> -->
      </div>
    </section>
</main>
@endsection
