@extends('layout.panel')

@section('title')
    @lang('all.users')
@endsection

@section('page_title')
    @lang('all.users')
@endsection


@section('breadcrumb_title')
    @lang('all.users')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('users' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
