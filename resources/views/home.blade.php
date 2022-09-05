@extends('layout')
@section('title','Dashboard - ATventory')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->
    @if(auth()->user()->level=='1' or auth()->user()->level=='3')
    @foreach ($barang as $data)
        @if($data->satuan == 'Dus')
          @if($data->stok < 50)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-octagon me-1"></i>
            Stok {{$data->nama_barang}} Kurang Dari 50 {{$data->satuan}} !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

        @elseif($data->satuan == 'Pack')
          @if($data->stok < 80)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-octagon me-1"></i>
            Stok {{$data->nama_barang}} Kurang Dari 80 {{$data->satuan}} !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

        @elseif($data->satuan == 'Lusin')
          @if($data->stok < 60)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-octagon me-1"></i>
            Stok {{$data->nama_barang}} Kurang Dari 60 {{$data->satuan}} !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

        @elseif($data->satuan == 'Renceng')
          @if($data->stok < 100)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-octagon me-1"></i>
            Stok {{$data->nama_barang}} Kurang Dari 100 {{$data->satuan}} !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

        @endif
      
    @endforeach
    @endif


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-4">

          <!-- Top Selling -->
          <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Stok Barang Tersedia</h5>

                  <table class="table datatable table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($barang as $data)
                      <tr>
                        <td><a class="text-dark fw-bold">{{$data->nama_barang}}</a></td>
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
                  <h5 class="card-title">Total Penjualan Bulan Ini</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-truck-line"></i>
                    </div>
                    <div class="ps-3">
                      <!-- jumlah data outlet keseluruhan -->
                      <h5 class="title fw-bold">Rp. {{number_format($total_jual)}}</h5>
                      <span class="text-success small pt-1 fw-bold"> <a href="{{ route('penjualan.index') }}">{{$jual_month}} Transaksi Penjualan</a></span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          
            <div class="col-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Total Pembelian Bulan Ini</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-shopping-cart-line"></i>
                    </div>
                    <div class="ps-3">
                      <h5 class="title fw-bold">Rp. {{number_format($total_beli)}}</h5>
                      <span class="text-success small pt-1 fw-bold"> <a href="{{ route('pembelian.index') }}">{{$beli_month}} Transaksi Pembelian</a></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Laba Bulan Ini</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-hand-coin-line"></i>
                    </div>
                    <div class="ps-3">
                      @if($laba <= 0)
                      <h5 class="title text-danger fw-bold">Rp {{number_format($laba)}}</h5>
                      @else
                      <h5 class="title text-success fw-bold">Rp {{number_format($laba)}}</h5>
                      @endif
                      <!-- <span class="text small pt-1 fw-bold">Total Laba Bulan Ini</span> -->
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endif

            <!-- Revenue Card -->
            @if(auth()->user()->level=='2')
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
                      
                      <span class="text-success small pt-1 fw-bold"> <a href="{{ route('outlet.index') }}">Total Outlet</a></span>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endif<!-- End Revenue Card -->
        </div><!-- End Left side columns -->


        <!-- Right side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Recent Sales -->
            @if(auth()->user()->level=='1' or auth()->user()->level=='3')
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Data Penjualan & Pembelian Perbulan</h5>
                  <div id="reportsChart"></div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Penjualan',
                          data: [
                            {{$jual_jan}},
                            {{$jual_feb}},
                            {{$jual_mar}},
                            {{$jual_apr}},
                            {{$jual_mei}},
                            {{$jual_jun}},
                            {{$jual_jul}},
                            {{$jual_aug}},
                            // {{$jual_sep}},
                            // {{$jual_okt}},
                            // {{$jual_nov}},
                            // {{$jual_des}},
                          ],
                        }, {
                          name: 'Pembelian',
                          data: [
                            {{$beli_jan}},
                            {{$beli_feb}},
                            {{$beli_mar}},
                            {{$beli_apr}},
                            {{$beli_mei}},
                            {{$beli_jun}},
                            {{$beli_jul}},
                            {{$beli_aug}},
                            // {{$beli_sep}},
                            // {{$beli_okt}},
                            // {{$beli_nov}},
                            // {{$beli_des}},
                          ]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'month',
                          categories: ['Januari', 
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
                                'Desember',]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Jumlah Penjualan & Pembelian Bulan Ini</h5>
              <canvas id="pieChart" style="max-height: 450px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: [
                        'Penjualan / Barang Keluar',
                        'Pembelian / Barang Masuk',
                        
                      ],
                      datasets: [{
                        label: 'Penjualan / Pembelian Per Bulan',
                        data: [{{$jual_month}},{{$beli_month}}],
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
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">Outlet</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($piutang as $data)
                      <tr>
                        <!-- <th scope="row"><a class="text-primary fw-bold" href="{{route('piutang.index')}}">{{$data->id_piutang }}</a></th> -->
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