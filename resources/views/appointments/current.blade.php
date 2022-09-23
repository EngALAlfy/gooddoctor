@extends('layout.panel')

@section('title')
    @lang('all.current_appointment')
@endsection

@section('page_title')
    @lang('all.current_appointment')
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">@lang('all.appointments')</a></li>
    <li class="breadcrumb-item"><a href="{{route('appointments.today')}}">@lang('all.today_appointments')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.current_appointment')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('current-appointment' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
