@extends('layout.panel')

@section('title')
    @lang('all.appointment_types')
@endsection

@section('page_title')
    @lang('all.appointment_types')
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">@lang('all.appointment')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.appointment_types')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('appointment-types' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
