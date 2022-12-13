@extends('layout.panel')

@section('title')
    @lang('all.drug') : {{ $drug->name }} {{ $drug->ar_name ? ' - ' . $drug->ar_name : '' }}
@endsection

@section('page_title')
    @lang('all.drug') :{{ $drug->name }} {{ $drug->ar_name ? ' - ' . $drug->ar_name : '' }}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('drugs.index') }}">@lang('all.drugs')</a></li>
@endpush

@section('breadcrumb_title')
    {{ $drug->name }} {{ $drug->ar_name ? ' - ' . $drug->ar_name : '' }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('all.appointments')</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (!$drug->recipes || count($drug->recipes) <= 0)
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
                                    @foreach ($drug->recipes as $recipe)
                                        <tr>
                                            <td>
                                                <a
                                                    href="{{ route('appointments.show', $recipe->appointment) }}">#{{ $recipe->appointment->id }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('patients.show', $recipe->appointment->patient) }}">
                                                    {{ $recipe->appointment->patient->name }}
                                                </a>

                                            </td>
                                            <td>
                                                <span class="badge badge-success p-2" style="font-size: 16px">
                                                    {{ $recipe->appointment->order }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('appointment-types.show', $recipe->appointment->type) }}"><small
                                                        class="badge badge-warning"><i
                                                            class="far fa-clock mr-1"></i>{{ $recipe->appointment->type->name }}</small></a>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('appointments.show', $recipe->appointment) }}">{{ $recipe->appointment->date }}</a>
                                            </td>

                                            <td>
                                                <small
                                                    class="badge @if ($recipe->appointment->status == 'hold') badge-info @elseif ($recipe->appointment->status == 'entered') badge-success @elseif ($recipe->appointment->status == 'exited') badge-warning @elseif($recipe->appointment->status == 'cancelled') badge-danger @endif "><i
                                                        class="far fa-clock mr-1"></i>{{ __('all.' . $recipe->appointment->status) }}</small>
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
