<!DOCTYPE html>
<html lang="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}" dir="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/icon.ico')}}">

    <title>@yield('title') | GoodDoctor</title>
    @include('includes.styles')

    @include('includes.fonts')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('assets/img/logo.png')}}" alt="{{env('app_name')}}" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>


            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('appointments.today')}}" class="nav-link">@lang('all.today_appointments')</a>
         </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('appointments.current')}}" class="nav-link">@lang('all.current_appointment')</a>
            </li>

            @stack('nav_buttons')
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <x-user-menu />

            <!-- Language Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="flag-icon flag-icon-{{ strtolower(str_replace(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()."_" , "" , \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleRegional())) }}"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left p-0">
            @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a @class(["dropdown-item" , "active" =>  \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == $localeCode]) rel="alternate" hreflang="{{ $localeCode }}" href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <i class="flag-icon flag-icon-{{strtolower(str_replace($localeCode ."_" , "" , $properties['regional']))}} mr-2"></i>{{ $properties['native'] }}
                    </a>

            @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="ahi ahi-i_note_action" style="font-size: 26px;"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-main-sidebar />
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page_title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/">@lang('all.home')</a></li>
                            @stack('breadcrumb')
                            <li class="breadcrumb-item active">@yield('breadcrumb_title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('includes.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <textarea name="" id="" class="w-100 h-100 bg-transparent text-white p-l-10 p-r-10 p-t-10"></textarea>
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('includes.scripts')

</body>
</html>
