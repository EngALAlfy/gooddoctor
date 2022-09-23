@extends('layout.panel')

@section('title')
    @lang('all.settings')
@endsection

@section('page_title')
    @lang('all.settings')
@endsection


@section('breadcrumb_title')
    @lang('all.settings')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('settings')
            </div>
        </div>
    </div>
@endsection
