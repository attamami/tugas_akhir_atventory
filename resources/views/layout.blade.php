<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <meta content="" name="description">
  <meta content="" name="keywords"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Favicons -->
  <link href="{{asset('assets/img/Logo-TAAT.jpg')}}" rel="icon">
  <link href="{{asset('assets/img/Logo-TAAT.jpg')}}" rel="apple-touch-icon">

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

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="assets/img/Logo-TAAT.jpg" alt="">
        <span class="d-none d-lg-block">ATventory</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <!-- <span class="d-none d-lg-block">Sumber Rejeki</span> -->
    </div><!-- End Logo -->
    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Notification Nav -->

        <!-- End Messages Nav -->

        
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin Sumber Rezeki</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
              <span>Sumber Rejeki</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/">
          <i class="ri-apps-line"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#kontrol-nav" data-bs-toggle="collapse" href="">
          <i class="ri-stack-line"></i><span>Barang</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kontrol-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('barang.index') }}">
              <i class="bi bi-circle"></i><span>Data Barang</span>
            </a>
          </li>

          <li>
            <a href="{{ route('stok.index') }}">
              <i class="bi bi-circle"></i><span>Stok</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#beli-nav" data-bs-toggle="collapse" href="">
          <i class="ri-shopping-cart-2-line"></i><span>Pembelian & Barang Masuk</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="beli-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('brgbaru.index') }}">
              <i class="bi bi-circle"></i><span>Barang Baru</span>
            </a>
          </li>

          <li>
            <a href="{{ route('restok.index') }}">
              <i class="bi bi-circle"></i><span>Re-Stok</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pembelian Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="ri-money-dollar-circle-line"></i>
          <span>Penjualan & Barang Keluar</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#piutang-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-hand-coin-line"></i><span>Hutang Piutang</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="piutang-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Hutang Dagang</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Piutang Dagang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#entity-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-bubble-chart-line"></i><span>Manajemen Entitas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="entity-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('salesd.index') }}">
              <i class="bi bi-circle"></i><span>Data Sales</span>
            </a>
          </li>
          <li>
            <a href="{{ route('outlet.index') }}">
              <i class="bi bi-circle"></i><span>Data Outlet</span>
            </a>
          </li>
          <li>
            <a href="{{ route('supplier.index') }}">
              <i class="bi bi-circle"></i><span>Data Supplier</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- End Icons Nav -->
      <li class="nav-heading">Sistem</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="ri-file-list-3-line"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="ri-settings-fill"></i>
          <span>Manajemen User</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  @yield('content')
<br><br><br>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>TAAT Progresif</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">TAAT Progresif</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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
  
</body>

</html>