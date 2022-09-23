@extends('layout.auth')
@section('title')
    @lang('all.license')
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

                    <h5>@lang('all.key')</h5>
                    <p>{{ $key }}</p>
                    <hr>
                    {{-- <h3>MachineGuid</h3>
                    <p>{{$MachineGuid}}</p>

                    <hr>


                    <h3>hard_serial</h3>
                    <p>{{$hard_serial[1]}}</p>

                    <hr>

                    <h3>uuid</h3>
                    <p>{{$UUID[1]}}</p>

                    <hr> --}}

                    <h5>@lang('all.code')</h5>
                    <p>{{ $code }}</p>

                    <hr>

                    <form action="{{ route('license.verify') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('post')

                        <div class="form-group">
                            <label for="serial_code">@lang('all.serial_code')</label>
                            <input type="text" class="form-control" id="serial_code" name="serial_code">
                        </div>

                        <button type="submit" class="btn btn-success">@lang('all.submit')</button>
                        <button type="reset" class="btn btn-warning">@lang('all.reset')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
