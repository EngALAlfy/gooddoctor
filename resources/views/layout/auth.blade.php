<!DOCTYPE html>
<html lang="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}"
    dir="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/adminLTE/RTL/css/adminlte.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/custom/RTL/css/style.css') }}">
    @else
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/adminLTE/LTR/css/adminlte.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/custom/css/style.css') }}">

    <!-- dims (margins and paddings -->
    <link rel="stylesheet" href="{{ asset('assets/custom/css/dims.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/toastr/toastr.css') }}">

    @stack('styles')
</head>

<body class="hold-transition login-page">

    @yield('content')



    <!-- jQuery -->
    <script src="{{ asset('assets/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/adminLTE/RTL/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/assets/adminLTE/plugins/toastr/toastr.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
