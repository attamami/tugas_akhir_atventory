@extends('layout')
@section('title','Dashboard - ATventory')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>

    </div><!-- End Page Title -->


    <section class="section dashboard">
      <div class="row">

        <!-- Right side columns -->
        <div class="col-lg-4">
          
          <!-- Revenue Card -->
          <div class="col-12">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Outlet</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-store-2-line"></i>
                    </div>
                    <div class="ps-3">
                      <!-- jumlah data outlet keseluruhan -->
                      <h6>{{$coutlet}}</h6>
                      @if(auth()->user()->level=='1')
                      <span class="text-success small pt-1 fw-bold"> <a href="{{ route('outlet.index') }}">Total Outlet</a></span>
                      @else
                      <span class="text-success small pt-1 fw-bold">Total Outlet</span>
                      @endif

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

          <!-- Top Selling -->
          <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Stok Barang Tersedia</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($barang as $data)
                      <tr>
                        <td><a href="{{route('barang.index')}}" class="text-primary fw-bold">{{$data->nama_barang}}</a></td>
                        <td>{{$data->stok}}</td>
                      </tr>
                      
                    @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
        

         

        </div><!-- End Right side columns -->
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Daftar Piutang Dagang</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Outlet</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($piutang as $data)
                      <tr>
                        <th scope="row"><a class="text-primary fw-bold" href="{{route('piutang.index')}}">{{$data->id_piutang }}</a></th>
                        <td>{{$data->nama_outlet}}</td>
                        <td>{{$data->nominal_hutang}}</td>
                        <td><span class="">{{$data->ket_lunas}}</span></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
            <!-- Sales Card -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Data Outlet</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Nama Outlet</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Alamat</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($outlet as $data)
                      <tr>
                        <th scope="row"><a href="#">{{$data->nama_outlet }}</a></th>
                        <td>{{$data->telp}}</td>
                        <td>{{$data->alamat}}</td>
                        
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
</main>
@endsection