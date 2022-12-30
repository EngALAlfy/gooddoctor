@extends('layout.panel')

@section('title')
    @lang('all.date_appointments') : {{$date}}
@endsection

@section('page_title')
    @lang('all.date_appointments') : {{$date}}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">@lang('all.appointments')</a></li>
@endpush

@section('breadcrumb_title')
    {{$date}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('date-appointments' , [ 'date' => $date , 'delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
