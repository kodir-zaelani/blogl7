<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('/uploads/images/logo/favicon.png') }}">	
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <livewire:styles/>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        @yield('content')
    </div>
    <livewire:scripts/>
    <!-- jQuery -->
    <script src="{{ asset('/assets/adminlte30/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/adminlte30/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte30/plugins/toastr/toastr.min.js') }}">
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/adminlte30/dist/js/adminlte.js') }}"></script> 
    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}')
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>
</body>
</html>