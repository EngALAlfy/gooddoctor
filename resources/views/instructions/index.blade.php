@extends('layout.panel')

@section('title')
    @lang('all.instructions')
@endsection

@section('page_title')
    @lang('all.instructions')
@endsection


@section('breadcrumb_title')
    @lang('all.instructions')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('instructions' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
