<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/health-icons/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/adminLTE/plugins/flag-icon-css/css/flag-icon.css')}}">
@if( \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection()  == 'rtl')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminLTE/RTL/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('assets/custom/RTL/css/style.css')}}">
@else
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminLTE/LTR/css/adminlte.css')}}">
@endif
<link rel="stylesheet" href="{{asset('assets/custom/css/style.css')}}">
<!-- dims (margins and paddings -->
<link rel="stylesheet" href="{{asset('assets/custom/css/dims.css')}}">

<link rel="stylesheet" href="{{asset('assets/adminLTE/plugins/toastr/toastr.css')}}">

<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('assets/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
@livewireStyles

@stack('styles')

<!-- toastr at first of the page : important -->
<!-- jQuery -->
<script src="{{asset("assets/adminLTE/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/adminLTE/plugins/toastr/toastr.min.js")}}"></script>
