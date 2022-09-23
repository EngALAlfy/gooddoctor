@extends('layout.panel')

@section('title')
    @lang('all.next_appointments')
@endsection

@section('page_title')
    @lang('all.next_appointments')
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">@lang('all.appointments')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.next_appointments')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('next-appointments' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
