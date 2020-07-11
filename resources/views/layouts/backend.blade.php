<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin - Web Blog')</title>

  <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/toastr/toastr.min.css') }}">
    @stack('page-style')
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="/assets/adminlte30/dist/css/custom.css"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <livewire:styles />
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <livewire:backend.admin.main.header />
     @yield('content')
  <livewire:backend.admin.main.rightbar />
  <livewire:backend.admin.main.footer />
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
    <script src="{{ asset('/assets/adminlte30/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/adminlte30/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('/assets/adminlte30/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @stack('footer-script')
    <!-- Toastr -->
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/adminlte30/dist/js/adminlte.min.js') }}"></script>
<livewire:scripts />
</body>
</html>
