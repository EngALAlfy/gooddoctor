@extends('layout.panel')

@section('title')
    @lang('all.search')
@endsection

@section('breadcrumb_title')
    @lang('all.search')
@endsection

@section('content')
<div class="container-fluid">
    <form action="{{route('search')}}">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input name="q" type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="{{request('q')}}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
