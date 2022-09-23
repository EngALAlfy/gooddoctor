@extends('layout.panel')

@section('title')
    @lang('all.diseases')
@endsection

@section('page_title')
    @lang('all.diseases')
@endsection


@section('breadcrumb_title')
    @lang('all.diseases')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('diseases' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
