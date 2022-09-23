@extends('layout.auth')

@section('title')
    @lang('all.error') @lang('all.install')
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

                    <div class="m-t-10 sufee-alert alert with-close alert-danger fade show">
                        <span class="badge badge-pill badge-error">@lang('all.error')</span>
                        <i class="icon fas fa-close"></i>

                        @lang('all.install') @lang('all.error')

                    </div>

                    <h5 class="m-t-20 ">@lang('all.error')</h5>
                    <p>{{ $error }}</p>


                </div>
            </div>
        </div>
    </div>
@endsection
