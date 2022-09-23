@extends('layout.panel')

@section('title')
    @lang('all.drugs')
@endsection

@section('page_title')
    @lang('all.drugs')
@endsection

@section('breadcrumb_title')
    @lang('all.drugs')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('drugs' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
