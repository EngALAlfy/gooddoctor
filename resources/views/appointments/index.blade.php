@extends('layout.panel')

@section('title')
    @lang('all.all_appointments')
@endsection

@section('page_title')
    @lang('all.all_appointments')
@endsection


@section('breadcrumb_title')
    @lang('all.appointments')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('all-appointments' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
