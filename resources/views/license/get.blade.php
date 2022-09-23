@extends('layout.auth')
@section('title')
    @lang('all.get') @lang('all.license')
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

                    @include('includes.status')

                    <h5>@lang('all.serial_code')</h5>

                        <p>{{ session('serial_code') ?? '----' }}</p>

                        <hr>

                    <form action="{{ route('license.makeSerialCodeLicense') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('post')

                        <div class="form-group">
                            <label for="code">@lang('all.code')</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="@lang('all.code')">
                        </div>

                        <div class="form-group">
                            <label for="days_of_license">@lang('all.days_of_license')</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="days_of_license" name="days_of_license" placeholder="@lang('all.days_of_license')">
                                <div class="input-group-append">
                                    <div class="input-group-text">@lang('all.days')</div>
                                  </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">@lang('all.submit')</button>
                        <button type="reset" class="btn btn-warning">@lang('all.reset')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
