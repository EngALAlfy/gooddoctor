@extends('layout.auth')

@section('title')
    @lang('all.success') @lang('all.license')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-7">
                <div class="card-header">
                    <div class="card-title">
                        <h4>@lang('all.license')</h4>

                    </div>
                </div>
                <div class="card-body">

                    <div class="m-t-10 sufee-alert alert with-close alert-success fade show">
                        <span class="badge badge-pill badge-success">@lang('all.success')</span>
                        <i class="icon fas fa-check"></i>

                        @lang('all.license_done_successfully')

                    </div>

                    <h5 class="m-t-20 ">@lang('all.start_license_date')</h5>
                    <p>{{ $start_license_date->format('Y-m-d') }}</p>

                    <h5 class="m-t-20 ">@lang('all.end_license_date')</h5>
                    <p>{{ $end_license_date == "unlimited" ? __('all.unlimited') : $end_license_date->format('Y-m-d') }}</p>


                    <a class="m-t-20 btn btn-success" href="{{ route('home') }}"><i
                            class="fa fa-home mr-2"></i>@lang('all.home')</a>

                </div>
            </div>
        </div>
    </div>
@endsection
