@extends('layout.panel')

@section('title')
    @lang('all.rays')
@endsection

@section('page_title')
    @lang('all.rays')
@endsection


@section('breadcrumb_title')
    @lang('all.rays')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('rays' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
