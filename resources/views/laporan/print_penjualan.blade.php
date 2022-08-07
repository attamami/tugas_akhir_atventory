<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Penjualan</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body onload="window.print();">
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- <div class="scrolling-wrapper"> -->
          <div class="card">
            <div class="card-body">
              <center><h5 class="card-title">Laporan Data Penjualan</h5></center>
              <p align="center">Periode Tanggal {{$tgl_awal}} s/d {{$tgl_akhir}}</p>
              <table class="table" id="table_anc" style="overflow-x: auto;">
                <thead>
                  <tr>
                    <th scope="col">ID Penjualan</th>
                    <th scope="col">ID Outlet</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Harga Per Satuan</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Jual</th>
                  </tr>
                </thead>

                @if($sum_total == '0')
                  Tidak Ada Data!
                @else

                @php($total=0)
                @foreach ($lap_penjualan as $data)
                  <tr>
                    <td>{{ $data->id_penjualan }}</td>
                    <td>{{ $data->id_outlet }}</td>
                    <td>{{ $data->id_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>{{ $data->jenis_barang }}</td>
                    <td>Rp {{ number_format($data->harga_jual) }}</td>
                    <td>{{ $data->satuan }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->totalhrg) }}</td>
                    @php($total += $data->totalhrg)
                    <td>{{ $data->tgl_jual }}</td>
                  </tr>
                @endforeach
                <tr>
                    <td></td> <td></td>
                    <td></td> <td></td>
                    <td></td> <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td><strong>Rp {{number_format($total)}}</strong></td>  <td></td>
                  </tr>
                </table>
                @endif
                
            
                </div>
                </div>
                </div>
                </div>
                </div>
    </section>
</body>
</html>
<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>