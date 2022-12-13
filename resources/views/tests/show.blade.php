@extends('layout.panel')

@section('title')
    @lang('all.test') : {{ $test->name ?? $test->ar_name}}
@endsection

@section('page_title')
    @lang('all.test') : {{ $test->name ?? $test->ar_name}}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('tests.index') }}">@lang('all.tests')</a></li>
@endpush

@section('breadcrumb_title')
    {{$test->name ?? $test->ar_name}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" data-step="2"  data-intro="step no 2">
                    <div class="card-header">
                        <h5 class="card-title">@lang('all.appointments')</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (!$test->appointments || count($test->appointments) <= 0)
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                            </div>
                        @else
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        #
                                    </th>
                                    <th style="width: 30%">
                                        @lang('all.patient')
                                    </th>
                                    <th style="width: 10%">
                                        @lang('all.order')
                                    </th>
                                    <th style="width: 15%">
                                        @lang('all.appointment_type')
                                    </th>
                                    <th style="width: 20%">
                                        @lang('all.date')
                                    </th>

                                    <th style="width: 20%">
                                        @lang('all.status')
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($test->appointments as $appointment)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('appointments.show', $appointment) }}">#{{ $appointment->id }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('patients.show', $appointment->patient) }}">
                                                {{ $appointment->patient->name }}
                                            </a>

                                        </td>
                                        <td>
                                                <span class="badge badge-success p-2" style="font-size: 16px">
                                                    {{ $appointment->order }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('appointment-types.show', $appointment->type) }}"><small
                                                    class="badge badge-warning"><i
                                                        class="far fa-clock mr-1"></i>{{ $appointment->type->name }}</small></a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('appointments.show', $appointment) }}">{{ $appointment->date }}</a>
                                        </td>

                                        <td>
                                            <small
                                                class="badge @if ($appointment->status == 'hold') badge-info @elseif ($appointment->status == 'entered') badge-success @elseif ($appointment->status == 'exited') badge-warning @elseif($appointment->status == 'cancelled') badge-danger @endif "><i
                                                    class="far fa-clock mr-1"></i>{{ __('all.' . $appointment->status) }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
