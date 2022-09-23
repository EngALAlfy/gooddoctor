@extends('layout.auth')

@section('title')
    @lang('all.success') @lang('all.install')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-7">
                <div class="card-header">
                    <div class="card-title">
                        <h4>@lang('all.install')</h4>

                    </div>
                </div>
                <div class="card-body">

                    <div class="m-t-10 sufee-alert alert with-close alert-success fade show">
                        <span class="badge badge-pill badge-success">@lang('all.success')</span>
                        <i class="icon fas fa-check"></i>

                        @lang('all.install_done_successfully');

                    </div>

                    <a class="m-t-20 btn btn-success" href="{{ route('home') }}"><i
                            class="fa fa-home mr-2"></i>@lang('all.home')</a>

                </div>
            </div>
        </div>
    </div>
@endsection
