@extends('layout')
@section('title','Dashboard - ATventory')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>

    </div><!-- End Page Title -->


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-4">

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

            @if(auth()->user()->level=='1' or auth()->user()->level=='3')
            <div class="col-12">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Total Penjualan Hari Ini</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-truck-line"></i>
                    </div>
                    <div class="ps-3">
                      <!-- jumlah data outlet keseluruhan -->
                      <h6>{{$jual_today}}</h6>
                      <span class="text-success small pt-1 fw-bold"> <a href="{{ route('penjualan.index') }}">Penjualan</a></span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          
            <div class="col-12">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Total Pembelian Hari Ini</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-shopping-cart-line"></i>
                    </div>
                    <div class="ps-3">
                      <!-- jumlah data outlet keseluruhan -->
                      <h6>{{$beli_today}}</h6>
                      
                      <span class="text-success small pt-1 fw-bold"> <a href="{{ route('pembelian.index') }}">Pembelian</a></span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endif

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
                      @if(auth()->user()->level=='1' or auth()->user()->level=='3')
                      <span class="text-success small pt-1 fw-bold"> <a href="{{ route('outlet.index') }}">Total Outlet</a></span>
                      @else
                      <span class="text-success small pt-1 fw-bold">Total Outlet</span>
                      @endif

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
        </div><!-- End Left side columns -->


        <!-- Right side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Recent Sales -->
            @if(auth()->user()->level=='1' or auth()->user()->level=='3')
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Data Penjualan & Pembelian Per Bulan</h5>
                  <canvas id="barChart" style="max-height: 400px;"></canvas>
                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#barChart'), {
                      type: 'bar',
                      data: {
                        labels: ['Januari', 
                                'Februari', 
                                'Maret', 
                                'April', 
                                'Mei', 
                                'Juni', 
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember',
                              ],
                        datasets: [{
                          label: 'Penjualan / Barang Keluar',
                          data: [
                            {{$jual_jan}},
                            {{$jual_feb}},
                            {{$jual_mar}},
                            {{$jual_apr}},
                            {{$jual_mei}},
                            {{$jual_jun}},
                            {{$jual_jul}},
                            {{$jual_aug}},
                            {{$jual_sep}},
                            {{$jual_okt}},
                            {{$jual_nov}},
                            {{$jual_des}},
                          ],
                          backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                          ],
                          borderColor: [
                            'rgb(255, 99, 132)',
                          ],
                          borderWidth: 1
                        },
                        {
                          label: 'Pembelian / Barang Masuk',
                          data: [
                            {{$beli_jan}},
                            {{$beli_feb}},
                            {{$beli_mar}},
                            {{$beli_apr}},
                            {{$beli_mei}},
                            {{$beli_jun}},
                            {{$beli_jul}},
                            {{$beli_aug}},
                            {{$beli_sep}},
                            {{$beli_okt}},
                            {{$beli_nov}},
                            {{$beli_des}},
                          ],
                          backgroundColor: [
                            'rgba(75, 192, 192, 0.5)',
                            ],
                          borderColor: [
                            'rgb(75, 192, 192)',
                            ],
                          borderWidth: 1
                        }]
                      },
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  });
                  </script>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Jumlah Data Penjualan & Pembelian</h5>
                  <canvas id="pieChart" style="max-height: 300px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#pieChart'), {
                        type: 'pie',
                        data: {
                          labels: [
                            'Penjualan',
                            'Pembelian',
                            // 'Yellow'
                          ],
                          datasets: [{
                            label: 'My First Dataset',
                            data: [{{$penjualan}},{{$pembelian}}],
                            backgroundColor: [
                              'rgb(255, 99, 132)',
                              'rgb(54, 162, 235)',
                            ],
                            hoverOffset: 4
                          }]
                        }
                      });
                    });
                  </script>
                </div>
              </div>
            </div>
            @endif

            @if(auth()->user()->level=='2')
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
            @endif

          </div>
        </div><!-- End Right side columns -->

      </div>
    </section>
</main>

<script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>

@endsection