@extends('layout.panel')

@section('title')
    @lang('all.tests')
@endsection

@section('page_title')
    @lang('all.tests')
@endsection


@section('breadcrumb_title')
    @lang('all.tests')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" >
               @livewire('tests' , ['delete_dialog'=>$delete_dialog])
            </div>
        </div>
    </div>
@endsection
