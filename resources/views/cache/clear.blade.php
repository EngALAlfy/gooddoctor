@extends('layout.auth')

@section('title')
    @lang('all.clear_cache')
@endsection

@section('content')
    <div class="container-fluid m-t-50">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="alert alert-default-info alert-dismissible">
                    <h5><i class="icon fas fa-info"></i>@lang('all.info')</h5>
                    {!! $output !!}
                </div>
            </div>
        </div>
    </div>
@endsection
