@extends('layout.panel')

@section('title')
    @lang('all.patient') : {{ $patient->name }}
@endsection

@section('page_title')
    @lang('all.patient') : {{ $patient->name }}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">@lang('all.patients')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.view') @lang('all.patient')
@endsection

@section('content')
    <div class="container-fluid">


        @include('includes.status')


        <div class="row">

            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">

                    <div class="card-tools">
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-tools float-left"><i
                                class="fa fa-edit"></i></a>
                    </div>
                    <div class="card-body box-profile pt-0">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src=""
                                onerror="this.src='{{ asset('assets/img/user.png') }}'" alt="patient profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $patient->name }}</h3>

                        <ul class="list-group list-group-unbordered m-b-10">
                            <li class="list-group-item">
                                <b><i class="fas ahi ahi-old_man mr-1"></i> @lang('all.age')</b> <span
                                    class="float-left">{{ $patient->age }}</span>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fas ahi ahi-sexual_reproductive_health mr-1"></i> @lang('all.type')</b> <span
                                    class="float-left">{{ __('all.' . $patient->sex) }}</span>
                            </li>
                            <li class="list-group-item ">
                                <b><i class="fa fa-map-marker-alt mr-1"></i> @lang('all.address')</b> <span
                                    class="float-left">{{ $patient->address }}</span>
                            </li>
                            <li class="list-group-item ">
                                <b><i class="fa fa-phone mr-1"></i> @lang('all.phone')</b> <a
                                    class="float-left">{{ $patient->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-info mr-1"></i> @lang('all.info')</b><span
                                    class="float-left">{{ $patient->info }}</span>
                            </li>
                        </ul>

                        <button data-toggle="modal" data-target="#delete-patient-modal"
                            class="btn btn-danger btn-block"><b>@lang('all.delete') @lang('all.patient')</b></button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('all.diseases_history')</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (!$patient->history || count($patient->history) <= 0)
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                            </div>
                        @else
                            <ol>
                                @foreach ($patient->history as $disease)
                                    <li>
                                        <div class="d-flex">
                                            <a href="{{ route('diseases.show', $disease) }}"
                                                class="w-100">{{ $disease->name }}</a>
                                            <button class="btn btn-tool">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('all.symptoms')</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (!$patient->getSymptomsList())
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                            </div>
                        @else
                            <ol>
                                {!! $patient->getSymptomsList() !!}
                            </ol>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('all.diseases')</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (!$patient->diseases || count($patient->diseases) <= 0)
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                            </div>
                        @else
                            <ol>
                                @foreach ($patient->diseases as $disease)
                                    <li>
                                        <div class="d-flex">
                                            <a href="{{ route('diseases.show', $disease) }}"
                                                class="w-100">{{ $disease->name }}</a>
                                            <button class="btn btn-tool">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

            <div class="col-md-9 ">
                <div class="row">

                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-indigo"><i class="fa ahi ahi-i_documents_accepted"
                                    style="font-size: 150%!important"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@lang('all.today_appointments')</span>
                                <span class="info-box-number">{{ $patient->today_appointments_count }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-navy"><i class="fa ahi ahi-health_data_sync"
                                    style="font-size: 150%!important"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@lang('all.next_appointments')</span>
                                <span class="info-box-number">{{ $patient->next_appointments_count }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-maroon"><i class="fa ahi ahi-i_documents_denied"
                                    style="font-size: 150%!important"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@lang('all.exited_appointments')</span>
                                <span class="info-box-number">{{ $patient->previous_appointments_count }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fa ahi ahi-i_exam_multiple_choice"
                                    style="font-size: 150%!important"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@lang('all.appointments')</span>
                                <span class="info-box-number">{{ $patient->appointments_count }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-teal"><i class="fa ahi ahi-microscope"
                                    style="font-size: 150%!important"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@lang('all.tests')</span>
                                <span class="info-box-number">{{ $tests }}</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-lightblue"><i class="fa ahi ahi-xray"
                                    style="font-size: 150%!important"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@lang('all.rays')</span>
                                <span class="info-box-number">{{ $rays }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fa ahi ahi-virus"
                                    style="font-size: 150%!important"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">@lang('all.diseases')</span>
                                <span class="info-box-number">{{ $diseases }}</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">@lang('all.next_appointments')</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (!$patient->next_appointments || count($patient->next_appointments) <= 0)
                                    <div class="alert alert-info m-l-10 m-r-10">
                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                    </div>
                                @else
                                    @foreach ($patient->next_appointments as $appointment)
                                        <div class="card card-primary  card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title"><a
                                                        href="{{ route('appointments.show', $appointment) }}">{{ $appointment->type->name }}
                                                        - {{ $appointment->date }}</a></h5>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">@lang('all.today_appointments')</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (!$patient->today_appointments || count($patient->today_appointments) <= 0)
                                    <div class="alert alert-info m-l-10 m-r-10">
                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                    </div>
                                @else
                                    @foreach ($patient->today_appointments as $appointment)
                                        <div class="card card-primary  card-outline">
                                            <div class="card-header">
                                                <span class="badge badge-success p-2 float-right mr-2"
                                                    style="font-size: 16px">{{ $appointment->order }}</span>

                                                <h5 class="card-title"><a
                                                        href="{{ route('appointments.show', $appointment) }}">{{ $appointment->type->name }}
                                                        - {{ $appointment->date }}</a></h5>
                                                <div class="card-tools">

                                                    <small
                                                        class="badge @if ($appointment->status == 'hold') badge-info @elseif ($appointment->status == 'entered') badge-success @elseif ($appointment->status == 'exited') badge-warning @elseif($appointment->status == 'cancelled') badge-danger @endif "><i
                                                            class="far fa-clock mr-1"></i>{{ __('all.' . $appointment->status) }}</small>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">@lang('all.exited_appointments')</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (!$patient->previous_appointments || count($patient->previous_appointments) <= 0)
                                    <div class="alert alert-info m-l-10 m-r-10">
                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                    </div>
                                @else
                                    @foreach ($patient->previous_appointments as $appointment)
                                        <div class="card card-primary  card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title"><a
                                                        href="{{ route('appointments.show', $appointment) }}">{{ $appointment->type->name }}
                                                        - {{ $appointment->date }}</a></h5>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">@lang('all.all_appointments')</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (!$patient->appointments || count($patient->appointments) <= 0)
                                    <div class="alert alert-info m-l-10 m-r-10">
                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                    </div>
                                @else
                                    @foreach ($patient->appointments as $appointment)
                                        <div class="card card-primary  card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title"><a
                                                        href="{{ route('appointments.show', $appointment) }}">{{ $appointment->type->name }}
                                                        - {{ $appointment->date }}</a></h5>
                                                <div class="card-tools">

                                                    <button class="btn btn-tool">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- delete account modal --}}
    <div class="modal fade" id="delete-patient-modal">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.delete') @lang('all.patient')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('all.are_you_sure')
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">@lang('all.no')</button>
                    <form action="{{ route('patients.destroy', $patient) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            @lang('all.yes')
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




@endsection
