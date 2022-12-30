@extends('layout.panel')

@section('title')
    @lang('all.search')
@endsection

@section('breadcrumb_title')
    @lang('all.search')
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                            @livewire('search' , [ 'query' => $query])
            </div>
        </div>

</div>
@endsection
