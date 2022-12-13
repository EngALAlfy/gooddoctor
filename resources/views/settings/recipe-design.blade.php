@extends('layout.panel')

@section('title')
    @lang('all.recipe-design')
@endsection

@section('page_title')
    @lang('all.recipe-design')
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings') }}">@lang('all.settings')</a></li>
@endpush


@section('breadcrumb_title')
    @lang('all.recipe-design')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('recipe-design')
            </div>
        </div>
    </div>
@endsection
