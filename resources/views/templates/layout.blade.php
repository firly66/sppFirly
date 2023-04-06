<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APP SPP | SMAKZIE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
  <!-- DataTables-->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- CDN STYLE -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">APP SPP | SMAKZIE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/') }}" class="d-block">Admin : ONLINE</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-house"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('laporanbug') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-users-gear"></i>
              <p>
                Laporan Bug
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('simulasi') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-users-gear"></i>
              <p>
                Simulasi Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{  route('simulasi-cucian') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-users-gear"></i>
              <p>
                Simulasi Cucian
              </p>
            </a>
          </li>
          <li class="nav-header">HALAMAN KELOLA</li>
          <li class="nav-item">
            <a href="{{ url('/siswa') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-users"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/tingkat') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-school"></i>
                  <p>
                      Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pegawai') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-users-gear"></i>
              <p>
                  petugas
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
            <i class="nav-icon fa-solid fa-hand-holding-dollar"></i>
                <p>
                    SPP
                </p>
            </a>
        </li>
        <li class="nav-header">HALAMAN TRANSAKSI</li>
        <li class="nav-item">
          <a href="{{ url('/pembayaran') }}" class="nav-link">
          <i class="nav-icon fa-solid fa-cart-arrow-down"></i>
            <p>
              Entri Transaksi
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
            <i class="nav-icon fa-solid fa-clock-rotate-left"></i>
                <p>
                    Histori Pembayaran
                </p>
            </a>
        </li>
        <li class="nav-header">LAINNYA</li>
        <li class="nav-item">
          <a href="../calendar.html" class="nav-link">
          <i class="nav-icon fa-solid fa-print"></i>
            <p>
              Cetak Laporan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/logout') }}" class="nav-link">
          <i class="nav-icon fa-solid fa-right-from-bracket"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
    </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        @yield('content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('templates.footer')
