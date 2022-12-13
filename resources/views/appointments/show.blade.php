@extends('layout.panel')

@section('title')
@lang('all.appointment') : {{$appointment->date}}
@endsection

@section('page_title')
    @lang('all.appointment') : {{$appointment->date}}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">@lang('all.appointments')</a></li>
@endpush

@section('breadcrumb_title')
{{$appointment->date}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('show-appointment' , ['appointment_id' => $appointment->id , 'delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
