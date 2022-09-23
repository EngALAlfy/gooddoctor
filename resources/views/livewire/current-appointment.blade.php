<div class="container">
    <div class="row">

        <div class="col-md-12">
            @include('includes.status')
        </div>

        @if (!$current_appointment)
            <div class="col-md-12">
                <div class="alert alert-info m-l-10 m-r-10">
                    <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                </div>
            </div>
        @else
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile p-b-0">
                        <div class="text-center">
                            <i class="profile-user-img img-circle ahi ahi-outpatient"
                                style="font-size: 70px!important"></i>
                        </div>

                        <h3 class="profile-username text-center">{{ $current_appointment->patient->name }}</h3>

                        <p class="text-muted text-center">{{ $current_appointment->type->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fas ahi ahi-old_man mr-1"></i> @lang('all.age')</b> <a
                                    class="float-left">{{ $current_appointment->patient->age }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fas ahi ahi-sexual_reproductive_health mr-1"></i> @lang('all.type')</b> <a
                                    class="float-left">{{ __('all.' . $current_appointment->patient->sex) }}</a>
                            </li>
                            <li class="list-group-item  border-bottom-0">
                                <b><i class="fa fa-map-marker-alt mr-1"></i> @lang('all.address')</b> <a
                                    class="float-left">{{ $current_appointment->patient->address }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#examine"
                                    data-toggle="tab">@lang('all.examine')</a></li>
                            <li class="nav-item"><a class="nav-link" href="#requirements"
                                    data-toggle="tab">@lang('all.requirements')</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recipe"
                                    data-toggle="tab">@lang('all.recipe')</a></li>
                            <li class="nav-item"><a class="nav-link" href="#instructions"
                                    data-toggle="tab">@lang('all.instructions')</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane " id="examine">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-secondary h-100">
                                            <div class="card-header">
                                                <h3 class="card-title">@lang('all.diseases_history')</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-toggle="modal"
                                                        data-target="#edit-diseases-history-modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="maximize">
                                                        <i class="fas fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @if (!$current_appointment->patient->history || count($current_appointment->patient->history) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                                                    </div>
                                                @else
                                                    <ol>
                                                        @foreach ($current_appointment->patient->history as $history)
                                                            <li>{{ $history->name }}</li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-secondary h-100">
                                            <div class="card-header">
                                                <h3 class="card-title">@lang('all.symptoms')</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-toggle="modal"
                                                        data-target="#edit-symptoms-modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="maximize">
                                                        <i class="fas fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @if (!$current_appointment->symptoms)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                                                    </div>
                                                @else
                                                    <ol>
                                                        {!! $current_appointment->symptoms !!}
                                                    </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-secondary  h-100">
                                            <div class="card-header">
                                                <h3 class="card-title">@lang('all.diseases')</h3>

                                                <div class="card-tools">

                                                    <button type="button" class="btn btn-tool" data-toggle="modal"
                                                        data-target="#add-disease-modal">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="maximize">
                                                        <i class="fas fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @if (!$current_appointment->diseases || count($current_appointment->diseases) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                                                    </div>
                                                @else
                                                    <ol id="diseases">
                                                        @foreach ($current_appointment->diseases as $disease)
                                                            <li><a class="d-block w-100 collapsed"
                                                                    data-toggle="collapse"
                                                                    href="#collapse-disease-{{ $disease->id }}"
                                                                    aria-expanded="false">{{ $disease->name }} </a>
                                                            </li>
                                                            <div id="collapse-disease-{{ $disease->id }}"
                                                                class="collapse" data-parent="#diseases">
                                                                <dl>
                                                                    @if ($disease->pivot->treatment_method)
                                                                        <dt>@lang('all.treatment_method')</dt>
                                                                        <dd>{{ $disease->pivot->treatment_method }}</dd>
                                                                    @endif
                                                                    @if ($disease->pivot->symptoms)
                                                                        <dt>@lang('all.symptoms')</dt>
                                                                        <dd>{{ $disease->pivot->symptoms }}</dd>
                                                                    @endif
                                                                    @if ($disease->pivot->diagnosis)
                                                                        <dt>@lang('all.diagnosis')</dt>
                                                                        <dd>{{ $disease->pivot->diagnosis }}</dd>
                                                                    @endif
                                                                    @if ($disease->pivot->info)
                                                                        <dt>@lang('all.info')</dt>
                                                                        <dd>{{ $disease->pivot->info }}</dd>
                                                                    @endif
                                                                </dl>
                                                            </div>
                                                        @endforeach
                                                    </ol>

                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="requirements">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-secondary h-100">
                                            <div class="card-header">
                                                <h3 class="card-title">@lang('all.rays')</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-toggle="modal"
                                                        data-target="#add-ray-modal">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="maximize">
                                                        <i class="fas fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @if (!$current_appointment->rays || count($current_appointment->rays) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                                                    </div>
                                                @else
                                                    <ol>
                                                        @foreach ($current_appointment->rays as $ray)
                                                            <li>{{ $ray->name }}</li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div><div class="col-md-6">
                                        <div class="card card-secondary h-100">
                                            <div class="card-header">
                                                <h3 class="card-title">@lang('all.tests')</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-toggle="modal"
                                                        data-target="#add-test-modal">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="maximize">
                                                        <i class="fas fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @if (!$current_appointment->tests || count($current_appointment->tests) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                                                    </div>
                                                @else
                                                    <ol>
                                                        @foreach ($current_appointment->tests as $test)
                                                            <li>{{ $test->name }}</li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="recipe">

                            </div>
                            <div class="tab-pane" id="instructions">

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @endif
    </div>



    {{-- add disease modal --}}

    <div wire:ignore.self class="modal fade" id="add-disease-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.add') @lang('all.diseases')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label>@lang('all.diseases')</label>
                        <select wire:model="disease_id" size="3"
                            class="form-control @error('disease_id') is-invalid @enderror">
                            @foreach ($diseases as $disease)
                                <option value="{{ $disease->id }}">{{ $disease->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('disease_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea wire:model="treatment_method" id="treatment_method"
                            class="form-control @error('treatment_method') is-invalid @enderror" placeholder="@lang('all.treatment_method')"></textarea>
                        @error('treatment_method')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="diagnosis" wire:model="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror"
                            placeholder="@lang('all.diagnosis')"></textarea>
                        @error('diagnosis')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="symptoms" wire:model="symptoms" class="form-control @error('symptoms') is-invalid @enderror"
                            placeholder="@lang('all.symptoms')"></textarea>
                        @error('symptoms')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="info" wire:model="info" class="form-control @error('info') is-invalid @enderror"
                            placeholder="@lang('all.info')"></textarea>
                        @error('info')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('all.cancel')</button>
                    <button wire:click="addDisease({{ $current_appointment->id }})" class="btn btn-primary">
                        @lang('all.save')
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    {{-- add history diesese modal --}}

    @push('scripts')
        <script>
            Livewire.on('disease-stored', () => {
                $('#add-disease-modal').modal('hide');
            });
        </script>
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/custom/js/pusher-js/pusher.js') }}"></script>
        {{-- <script src="{{ asset('assets/custom/js/laravel-echo/echo.js') }}"></script> --}}
        <script src="{{ asset('assets/custom/js/laravel-echo/echo-compiled.js') }}"></script>

        <script>
            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: 'DKHSkjkj',
                forceTLS: false,
                wsPort: 6001,
                wssPort: 6001,
                enabledTransports: ['ws'],
                wsHost: window.location.hostname,
                encrypted: false,
            });

            // echo.channel('current-appointment')
            //     .listen('.refresh', (e) => {
            //         @this.changeCurrentAppointment();
            //     });
        </script>
    @endpush

</div>
