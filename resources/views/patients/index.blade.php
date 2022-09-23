@extends('layout.panel')

@section('title')
    @lang('all.patients')
@endsection

@section('page_title')
    @lang('all.patients')
@endsection


@section('breadcrumb_title')
    @lang('all.patients')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('patients' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
