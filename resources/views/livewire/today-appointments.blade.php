<div>

    <div class="row justify-content-center">

        <div class="col-md-4 col-lg-3">
            <div class="info-box">

                <div class="info-box-content">
                    <span class="info-box-text">{{ $previous_appointment->patient->name ?? '--' }}</span>
                    <span class="info-box-number">{{ $previous_appointment->type->name ?? '--' }}</span>
                </div>
                <!-- /.info-box-content -->

                <span class="info-box-icon bg-warning" style="font-size: 30px;font-weight: 500">@lang('all.exited')</span>

            </div>


        </div>
        {{-- @if ($current_appointment != null) --}}

        <div class="col-md-4 col-lg-3">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"
                    style="font-size: 50px;font-weight: 800">{{ $current_appointment->order ?? '--' }}</span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ $current_appointment->patient->name ?? '--' }}</span>
                    <span class="info-box-number">{{ $current_appointment->type->name ?? '--' }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        {{ __('all.' . ($current_appointment->status ?? '')) }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-4 col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-info"
                    style="font-size: 40px;font-weight: 800"><i>{{ $next_appointment->order ?? '--' }}</i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ $next_appointment->patient->name ?? '--' }}</span>
                    <span class="info-box-number">{{ $next_appointment->type->name ?? '--' }}</span>
                </div>
                <!-- /.info-box-content -->

                <button data-toggle="tooltip" title="@lang('all.next')"
                    wire:click="nextAppointment({{ $current_appointment->id ?? 0 }} , {{ $next_appointment->id ?? 0 }})"
                    class="btn btn-flat m-t-15 m-b-15"><i class="fa fa-chevron-left"></i></button>

            </div>
        </div>
        {{-- @endif --}}
    </div>

    @if ($current_appointment)
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><i class="icon fas fa-info mr-2"></i> @lang('all.current_appointment_info')</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body row text-right">
                        <div class="col-md-3"><b>@lang('all.patient_name') :</b>
                            <a href="{{ route('patients.show', $current_appointment->patient) }}">
                                {{ $current_appointment->patient->name }}
                            </a>
                        </div>
                        <div class="col-md-3"><b>@lang('all.appointment_type') :</b> {{ $current_appointment->type->name }}</div>
                        <div class="col-md-3"><b>@lang('all.price') :</b> {{ $current_appointment->type->price }}</div>
                        <div class="col-md-3"><b>@lang('all.age') :</b> {{ $current_appointment->patient->age }}</div>
                        <div class="col-md-12 border-top m-t-20 m-b-20"></div>
                        <div class="col-md-6 row">
                            <div class="col-md-4"><b>@lang('all.symptoms') :</b> </div>
                            <div class="col-md-8">
                                <ul>
                                    {!! $current_appointment->getSymptomsList() !!}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-6"><b>@lang('all.info') :</b> </div>
                            <div class="col-md-6">{!! $current_appointment->info !!}</div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a target="_blank" href="{{route("print" , ["printable" => "order" , "appointment" => $current_appointment])}}" class="btn btn-app">
                            <i class="fa fa-sort-numeric-down"></i> @lang('all.print_order')
                        </a>
                        <a target="_blank" href="{{route("print" , ["printable" => "recipe" , "appointment" => $current_appointment])}}" class="btn btn-app">
                            <i class="fas ahi ahi-blister_pills_oval_x14"></i> @lang('all.print_recipe')
                        </a>
                        <a target="_blank" href="{{route("print" , ["printable" => "tests" , "appointment" => $current_appointment])}}" class="btn btn-app">
                            <i class="fas ahi ahi-microscope"></i>@lang('all.print_required_tests')
                        </a>
                        <a target="_blank" href="{{route("print" , ["printable" => "rays" , "appointment" => $current_appointment])}}" class="btn btn-app">
                            <i class="fas ahi ahi-xray"></i> @lang('all.print_required_rays')
                        </a>
                        <a  target="_blank" href="{{route("print" , ["printable" => "instructions" , "appointment" => $current_appointment])}}" class="btn btn-app">
                            <i class="fas ahi ahi-i_exam_multiple_choice"></i> @lang('all.print_instructions')
                        </a>
{{--                        <button class="btn btn-app">--}}
{{--                            <i class="fas ahi ahi-cardiogram"></i> @lang('all.print_info')--}}
{{--                        </button>--}}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    @endif

    @include('includes.status')


    <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <div class=" input-group input-group-sm m-auto" style="width: 150px">
                    <input type="search" wire:model="search" class="form-control" placeholder="@lang('all.search')">
                </div>
            </h3>

            <div class="card-tools">
                {{ $appointments->links() }}
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($appointments == null || count($appointments) <= 0)

                <div class="alert alert-info m-l-10 m-r-10">
                    <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                </div>
            @else
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                    @foreach ($appointments as $appointment)
                        <li class="{{ $appointment->status != 'hold' ? 'done' : '' }}"
                            data-id="{{ $appointment->id }}">
                            <span class="handle ui-sortable-handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>

                            <a href="{{ route('appointments.show', $appointment) }}" class="badge badge-success p-2"
                                style="font-size: 16px">
                                {{ $appointment->order }}</a>

                            <div class="icheck-primary d-inline ml-2">
                                <input
                                    wire:click="done({{ $appointment->id }} , $('#todoCheck-{{ $appointment->id }}').is(':checked'))"
                                    type="checkbox" {{ $appointment->status != 'hold' ? 'checked' : '' }}
                                    id="todoCheck-{{ $appointment->id }}">
                                <label for="todoCheck-{{ $appointment->id }}"></label>
                            </div>
                            <a href="{{ route('patients.show', $appointment->patient) }}" class="text">

                                {{ $appointment->patient->name }}</a>
                            <a href="{{ route('appointment-types.show', $appointment->type) }}"
                                class="badge badge-warning">
                                <i class="far fa-clock mr-1"></i>{{ $appointment->type->name }}
                            </a>
                            <div class="tools">
                                <i class="fas fa-edit"></i>
                                <i class="fas fa-trash-o"></i>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

            <button data-toggle="modal" data-target="#add-appointment-modal" type="button"
                class="btn btn-primary float-left"><i class="fa fa-plus mr-2"></i> @lang('all.add')
            </button>

            <div class="form-group float-right">

                <label>
                    <select wire:model="perPage" class="form-control">
                        <option>10</option>
                        <option>50</option>
                        <option>100</option>
                        <option>500</option>
                        <option>1000</option>
                    </select>
                </label>
            </div>
        </div>
    </div>



    @livewire('create-appointment')

    @push('scripts')
        <script>
            Livewire.on('appointment_stored', () => {
                $('#add-appointment-modal').modal('hide');
            });

            Livewire.on('patient_stored', () => {
                $('#add-patient-modal').modal('hide');
            });
        </script>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {

                $('.todo-list').sortable({
                    placeholder: 'sort-highlight',
                    handle: '.handle',
                    forcePlaceholderSize: true,
                    zIndex: 999999,
                    update: function(_, ui) {
                        @this.updateOrder(ui.item.data('id'), (ui.item.index() + 1));
                    }
                });
            });
        </script>

{{--        <script>--}}
{{--            function basicPopup(url) {--}}
{{--                window.open(url,'popUpWindow','height=500,width=500,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');--}}
{{--            }--}}
{{--        </script>--}}
    @endpush


    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.css') }}">
    @endpush

    {{-- @include('tests.create') --}}
    @include('appointments.delete')
    <!-- /.modal -->
</div>
