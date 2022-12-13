<div class="container">
    <div class="row">

        <div class="col-md-12">
            @include('includes.status')
        </div>

        @if (!$appointment)
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


                        <a href="{{ route('patients.show', $appointment->patient) }}">
                            <h3 class="profile-username text-center">{{ $appointment->patient->name }}</h3>
                        </a>

                        <p class="text-muted text-center">{{ $appointment->type->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fas ahi ahi-old_man mr-1"></i> @lang('all.age')</b> <a
                                    class="float-left">{{ $appointment->patient->age }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fas ahi ahi-sexual_reproductive_health mr-1"></i> @lang('all.type')</b> <a
                                    class="float-left">{{ __('all.' . $appointment->patient->sex) }}</a>
                            </li>
                            <li class="list-group-item  border-bottom-0">
                                <b><i class="fa fa-map-marker-alt mr-1"></i> @lang('all.address')</b> <a
                                    class="float-left">{{ $appointment->patient->address }}</a>
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
                            <li class="nav-item"><a wire:click="$set('tab' , 'info')"
                                    class="nav-link {{ $tab == 'info' ? 'active' : '' }}" href="#info"
                                    data-toggle="tab">@lang('all.info')</a></li>
                            <li class="nav-item"><a wire:click="$set('tab' , 'examine')"
                                    class="nav-link  {{ $tab == 'examine' ? 'active' : '' }}" href="#examine"
                                    data-toggle="tab">@lang('all.examine')</a></li>
                            <li class="nav-item"><a wire:click="$set('tab' , 'requirements')"
                                    class="nav-link  {{ $tab == 'requirements' ? 'active' : '' }}" href="#requirements"
                                    data-toggle="tab">@lang('all.requirements')</a></li>
                            <li class="nav-item"><a wire:click="$set('tab' , 'recipe')"
                                    class="nav-link  {{ $tab == 'recipe' ? 'active' : '' }}" href="#recipe"
                                    data-toggle="tab">@lang('all.recipe')</a></li>
                            <li class="nav-item"><a wire:click="$set('tab' , 'instructions')"
                                    class="nav-link  {{ $tab == 'instructions' ? 'active' : '' }}" href="#instructions"
                                    data-toggle="tab">@lang('all.instructions')</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="{{ $tab == 'info' ? 'active' : '' }} tab-pane " id="info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-row card-secondary h-100">
                                            <div class="card-header">
                                                <h5 class="card-title">@lang('all.diseases_history')</h5>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-toggle="modal"
                                                        data-target="#add-history-disease-modal">
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
                                                @if (!$appointment->patient->history || count($appointment->patient->history) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                                    </div>
                                                @else
                                                    @foreach ($appointment->patient->history as $history)
                                                        <div class="card card-primary card-outline">
                                                            <div class="card-header">
                                                                <h5 class="card-title">{{ $history->name }}</h5>
                                                                <div class="card-tools">
                                                                    {{-- <a href="#" class="btn btn-tool btn-link">#5</a> --}}
                                                                    <button
                                                                        wire:click="removeHistoryDisease({{ $appointment->id }} , {{ $history->id }})"
                                                                        class="btn btn-tool">
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
                                    <div class="col-md-6">
                                        <div class="card card-secondary h-100">
                                            <div class="card-header">
                                                <h5 class="card-title">@lang('all.symptoms')</h5>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        onclick="showEditSymptomsModal()">
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
                                                @if (!$appointment->symptoms)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                                    </div>
                                                @else
                                                    <ol>
                                                        {!! $appointment->getSymptomsList() !!}
                                                    </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="{{ $tab == 'examine' ? 'active' : '' }} tab-pane " id="examine">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-row card-secondary h-100">
                                            <div class="card-header">
                                                <h5 class="card-title">@lang('all.info') @lang('all.examine')</h5>

                                                <div class="card-tools">
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
                                                <div class="card card-primary card-outline">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><i
                                                                class="fa ahi ahi-heart_cardiogram mr-2"></i>@lang('all.pulse')
                                                        </h5>
                                                        <div class="card-tools">
                                                            <span
                                                                class="btn btn-tool btn-link">{{ $card->pulse ?? '--' }}</span>
                                                            <button
                                                                wire:click="$set('cardEditedField' , '{{ $cardEditedField == 'pulse' ? null : 'pulse' }}')"
                                                                class="btn btn-tool">
                                                                <i @class([
                                                                    'fas',
                                                                    'fa-pen' => $cardEditedField != 'pulse',
                                                                    'fa-times' => $cardEditedField == 'pulse',
                                                                ])></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @if ($cardEditedField == 'pulse')
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <input type="number" id="pulse" autofocus
                                                                    wire:model.defer="pulse"
                                                                    wire:keydown.enter="updatePatientCard({{ $appointment->id }})"
                                                                    class="form-control @error('pulse') is-invalid @enderror"
                                                                    placeholder="@lang('all.pulse')" />
                                                                @error('pulse')
                                                                    <span
                                                                        class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="card card-primary card-outline">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><i
                                                                class="fa ahi ahi-hiv_self_test mr-2"></i>@lang('all.glucose')
                                                        </h5>
                                                        <div class="card-tools">
                                                            <span
                                                                class="btn btn-tool btn-link">{{ $card->glucose ?? '--' }}</span>
                                                            <button
                                                                wire:click="$set('cardEditedField' , '{{ $cardEditedField == 'glucose' ? null : 'glucose' }}')"
                                                                class="btn btn-tool">
                                                                <i @class([
                                                                    'fas',
                                                                    'fa-pen' => $cardEditedField != 'glucose',
                                                                    'fa-times' => $cardEditedField == 'glucose',
                                                                ])></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @if ($cardEditedField == 'glucose')
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <input type="number" id="glucose" autofocus
                                                                    wire:model.defer="glucose"
                                                                    wire:keydown.enter="updatePatientCard({{ $appointment->id }})"
                                                                    class="form-control @error('glucose') is-invalid @enderror"
                                                                    placeholder="@lang('all.glucose')" />
                                                                @error('glucose')
                                                                    <span
                                                                        class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="card card-primary card-outline">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><i
                                                                class="fa ahi ahi-weight mr-2"></i>@lang('all.weight')
                                                        </h5>
                                                        <div class="card-tools">
                                                            <span
                                                                class="btn btn-tool btn-link">{{ $card->weight ?? '--' }}</span>
                                                            <button
                                                                wire:click="$set('cardEditedField' , '{{ $cardEditedField == 'weight' ? null : 'weight' }}')"
                                                                class="btn btn-tool">
                                                                <i @class([
                                                                    'fas',
                                                                    'fa-pen' => $cardEditedField != 'weight',
                                                                    'fa-times' => $cardEditedField == 'weight',
                                                                ])></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @if ($cardEditedField == 'weight')
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <input type="number" id="weight" autofocus
                                                                    wire:model.defer="weight"
                                                                    wire:keydown.enter="updatePatientCard({{ $appointment->id }})"
                                                                    class="form-control @error('weight') is-invalid @enderror"
                                                                    placeholder="@lang('all.weight')" />
                                                                @error('weight')
                                                                    <span
                                                                        class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="card card-primary card-outline">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><i
                                                                class="fa ahi ahi-blood_pressure_monitor mr-2"></i>@lang('all.pressure')
                                                        </h5>
                                                        <div class="card-tools">
                                                            <span class="btn btn-tool btn-link p-t-0 p-b-0">

                                                                <span>{{ $card->max_pressure ?? '--' }}</span>
                                                                <hr class="m-0 p-0">
                                                                <span>{{ $card->min_pressure ?? '--' }}</span>

                                                            </span>
                                                            <button
                                                                wire:click="$set('cardEditedField' , '{{ $cardEditedField == 'max_pressure' ? null : 'max_pressure' }}')"
                                                                class="btn btn-tool">
                                                                <i @class([
                                                                    'fas',
                                                                    'fa-pen' => $cardEditedField != 'max_pressure',
                                                                    'fa-times' => $cardEditedField == 'max_pressure',
                                                                ])></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @if ($cardEditedField == 'max_pressure')
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <input type="number" id="max_pressure" autofocus
                                                                    wire:model.defer="max_pressure"
                                                                    wire:keydown.enter="updatePatientCard({{ $appointment->id }})"
                                                                    class="form-control @error('max_pressure') is-invalid @enderror"
                                                                    placeholder="@lang('all.max_pressure')" />
                                                                @error('max_pressure')
                                                                    <span
                                                                        class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" id="min_pressure" autofocus
                                                                    wire:model.defer="min_pressure"
                                                                    wire:keydown.enter="updatePatientCard({{ $appointment->id }})"
                                                                    class="form-control @error('min_pressure') is-invalid @enderror"
                                                                    placeholder="@lang('all.min_pressure')" />
                                                                @error('min_pressure')
                                                                    <span
                                                                        class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-row card-secondary  h-100">
                                            <div class="card-header">
                                                <h5 class="card-title">@lang('all.diseases')</h5>

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
                                                @if (!$appointment->diseases || count($appointment->diseases) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                                    </div>
                                                @else
                                                    <ol id="diseases">
                                                        @foreach ($appointment->diseases as $disease)
                                                            <li>
                                                                <div class="d-flex"><a class="d-block w-100 collapsed"
                                                                        data-toggle="collapse"
                                                                        href="#collapse-disease-{{ $disease->id }}"
                                                                        aria-expanded="false">{{ $disease->name }}
                                                                    </a>

                                                                    <button
                                                                        wire:click="removeDisease({{ $appointment->id }} , {{ $disease->id }})"
                                                                        class="btn btn-tool">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </li>
                                                            <div id="collapse-disease-{{ $disease->id }}"
                                                                class="collapse" data-parent="#diseases">
                                                                <dl>
                                                                    @if ($disease->pivot->treatment_method)
                                                                        <dt>@lang('all.treatment_method')</dt>
                                                                        <dd>{{ $disease->pivot->treatment_method }}
                                                                        </dd>
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


                            <div class="{{ $tab == 'requirements' ? 'active' : '' }} tab-pane" id="requirements">
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
                                                @if (!$appointment->rays || count($appointment->rays) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                                    </div>
                                                @else
                                                    <ol>
                                                        @foreach ($appointment->rays as $ray)
                                                            <li>
                                                                <div class="d-flex">
                                                                    <span class="d-block w-100">
                                                                        {{ $ray->name }}

                                                                        ({{ $ray->ar_name }})
                                                                    </span>
                                                                    <button
                                                                        wire:click="removeRay({{ $appointment->id }} , {{ $ray->id }})"
                                                                        class="btn btn-tool">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                                @if (!$appointment->tests || count($appointment->tests) <= 0)
                                                    <div class="alert alert-info m-l-10 m-r-10">
                                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                                    </div>
                                                @else
                                                    <ol>
                                                        @foreach ($appointment->tests as $test)
                                                            <li>
                                                                <div class="d-flex">
                                                                    <span class="d-block w-100">
                                                                        {{ $test->name }}

                                                                        ({{ $test->ar_name }})
                                                                    </span>
                                                                    <button
                                                                        wire:click="removeTest({{ $appointment->id }} , {{ $test->id }})"
                                                                        class="btn btn-tool">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="{{ $tab == 'recipe' ? 'active' : '' }} tab-pane" id="recipe">

                                <div class="card card-secondary h-100">
                                    <div class="card-header">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-3 ">
                                                    <input type="text"
                                                        wire:keydown.enter="addDrugToRecipe({{ $appointment->id }})"
                                                        wire:keydown="$set('drug_id' , '')" id="drug_name"
                                                        class="form-control form-control-sm @error('drug_id') is-invalid @enderror"
                                                        wire:model="drug_name" placeholder="@lang('all.select_drug')">

                                                    @error('drug_id')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror

                                                    @if ($drugs && count($drugs) > 0)
                                                        <div class="input-group input-group-sm mb-0">
                                                            <select id="drug_id"
                                                                style="position: absolute;
                                                            top: 0;
                                                            left: auto;
                                                            right: 0;
                                                            width: 100%;
                                                            height: 150px;
                                                            z-index: 10"
                                                                size="5" wire:model="drug_id"
                                                                class="form-control @error('drug_id') is-invalid @enderror">
                                                                @foreach ($drugs as $drug)
                                                                    <option
                                                                        wire:click="$set('drug_name' , '{{ $drug->name }}')"
                                                                        value="{{ $drug->id }}">
                                                                        {{ $drug->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    @endif

                                                </div>

                                                <div class="col-md-3 input-group input-group-sm mb-0">
                                                    <input
                                                        wire:keydown.enter="addDrugToRecipe({{ $appointment->id }})"
                                                        type="number" wire:model.defer="repeat_every_hours"
                                                        placeholder="@lang('all.repeat_every_hours')"
                                                        class="form-control form-control-sm @error('repeat_every_hours') is-invalid @enderror" />
                                                    @error('repeat_every_hours')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-2 input-group input-group-sm mb-0">
                                                    <input
                                                        wire:keydown.enter="addDrugToRecipe({{ $appointment->id }})"
                                                        type="text" wire:model.defer="amount"
                                                        placeholder="@lang('all.amount')"
                                                        class="form-control form-control-sm @error('amount') is-invalid @enderror" />

                                                    @error('amount')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-3 input-group input-group-sm mb-0">
                                                    <input
                                                        wire:keydown.enter="addDrugToRecipe({{ $appointment->id }})"
                                                        wire:model.defer="info" rows="1"
                                                        placeholder="@lang('all.info')"
                                                        class="form-control form-control-sm @error('info') is-invalid @enderror">
                                                    @error('info')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="card-tools col-1 text-left">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="maximize">
                                                        <i class="fas fa-expand"></i>
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (!$appointment->recipe || count($appointment->recipe->drugs) <= 0)
                                            <div class="alert alert-info m-l-10 m-r-10">
                                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                            </div>
                                        @else
                                            <ul dir="ltr" class="text-left">
                                                @foreach ($appointment->recipe->drugs as $drug)
                                                    <li class="drug-recipe">
                                                        <div class="d-flex justify-content-between">
                                                            <span>
                                                                {{ $drug->name }}</span>

                                                            <span>{{ $drug->ar_name }}</span>
                                                            <span> {{ $drug->pivot->amount }}</span>
                                                            <span>
                                                                {{ trans_choice('all.repeat_every_x_hours', $drug->pivot->repeat_every_hours, ['x' => $drug->pivot->repeat_every_hours]) }}</span>

                                                            <span>{{ $drug->pivot->info }}</span>
                                                            <button
                                                                wire:click="removeDrugFromRecipe({{ $appointment->id }} , {{ $drug->id }})"
                                                                class="btn btn-tool">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="{{ $tab == 'instructions' ? 'active' : '' }} tab-pane" id="instructions">

                                <button data-target="#add-instructions-modal" data-toggle="modal"
                                    class="btn btn-block btn-success m-b-10"><i
                                        class="fa fa-plus mr-2"></i>@lang('all.add')</button>

                                @if (!$appointment->instructions)
                                    <div class="alert alert-info m-l-10 m-r-10">
                                        <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                    </div>
                                @else
                                    <div class="card card-primary">
                                        <div class="card-header ">
                                            <h5 class="card-title">
                                                {{ $appointment->instructions->name }}
                                            </h5>
                                            <div class="card-tools">
                                                <button
                                                    wire:click="removeInstructions({{ $appointment->id }})"
                                                    class="btn btn-tool"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            {!! str_replace("\n", '<br/>', $appointment->instructions->list) !!}
                                        </div>
                                    </div>
                                @endif

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



    @if ($appointment)
        {{-- add disease modal --}}
        <div wire:ignore.self class="modal fade" id="add-disease-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('all.add') @lang('all.diseases')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label>@lang('all.diseases')</label>
                            <div class="input-group">
                                <input type="text" wire:model="disease_name" name="disease_name" class="form-control"
                                    placeholder="@lang('all.search') @lang('all.diseases')">
                            </div>
                            <select wire:model.defer.defer="disease_id" size="5"
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
                            <textarea wire:model.defer="treatment_method" id="treatment_method"
                                class="form-control @error('treatment_method') is-invalid @enderror" placeholder="@lang('all.treatment_method')"></textarea>
                            @error('treatment_method')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="diagnosis" wire:model.defer="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror"
                                placeholder="@lang('all.diagnosis')"></textarea>
                            @error('diagnosis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="symptoms" wire:model.defer="symptoms" class="form-control @error('symptoms') is-invalid @enderror"
                                placeholder="@lang('all.symptoms')"></textarea>
                            @error('symptoms')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="info" wire:model.defer="info" class="form-control @error('info') is-invalid @enderror"
                                placeholder="@lang('all.info')"></textarea>
                            @error('info')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">@lang('all.cancel')</button>
                        <button wire:click="addDisease({{ $appointment->id }})" class="btn btn-primary">
                            @lang('all.save')
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- edit symptoms modal --}}
        <div wire:ignore.self class="modal fade" id="edit-symptoms-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('all.edit') @lang('all.symptoms')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea rows="6" id="symptoms" wire:model.defer="symptoms"
                                class="form-control @error('symptoms') is-invalid @enderror" placeholder="@lang('all.symptoms')">
                            </textarea>
                            @error('symptoms')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">@lang('all.cancel')</button>
                        <button wire:click="updateSymptoms({{ $appointment->id }})" class="btn btn-primary">
                            @lang('all.save')
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- add history diesese modal --}}
        <div wire:ignore.self class="modal fade" id="add-history-disease-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('all.add') @lang('all.diseases_history')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('all.diseases')</label>
                            <select wire:model.defer="disease_id" size="3"
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

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">@lang('all.cancel')</button>
                        <button wire:click="addHistoryDisease({{ $appointment->id }})"
                            class="btn btn-primary">
                            @lang('all.save')
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- add test modal --}}
        <div wire:ignore.self class="modal fade" id="add-test-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('all.add') @lang('all.tests')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('all.tests')</label>
                            <select wire:model.defer="test_id" size="3"
                                class="form-control @error('test_id') is-invalid @enderror">
                                @foreach ($tests as $test)
                                    <option value="{{ $test->id }}">{{ $test->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('test_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">@lang('all.cancel')</button>
                        <button wire:click="addTest({{ $appointment->id }})" class="btn btn-primary">
                            @lang('all.save')
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- add ray modal --}}
        <div wire:ignore.self class="modal fade" id="add-ray-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('all.add') @lang('all.rays')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('all.rays')</label>
                            <select wire:model.defer="ray_id" size="3"
                                class="form-control @error('ray_id') is-invalid @enderror">
                                @foreach ($rays as $ray)
                                    <option value="{{ $ray->id }}">{{ $ray->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ray_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">@lang('all.cancel')</button>
                        <button wire:click="addRay({{ $appointment->id }})" class="btn btn-primary">
                            @lang('all.save')
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- add instructions modal --}}
        <div wire:ignore.self class="modal fade" id="add-instructions-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('all.add') @lang('all.instructions')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('all.instructions')</label>
                            <select wire:model.defer="instructions_id" size="3"
                                class="form-control @error('instructions_id') is-invalid @enderror">
                                @foreach ($instructions as $instruction)
                                    <option value="{{ $instruction->id }}">{{ $instruction->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('instructions_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button data-toggle="modal" data-target="#add-modal" class="btn btn-block btn-info"><i
                                class="fa fa-plus mr-2"></i></button>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">@lang('all.cancel')</button>
                        <button wire:click="addInstructions({{ $appointment->id }})"
                            class="btn btn-primary">
                            @lang('all.save')
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        @livewire('create-instructions')

    @endif


    @push('scripts')
        <script>
            Livewire.on('modalHide', () => {
                $('.modal').modal('hide');
            });

            Livewire.on('stored', () => {
                // add new instructions modal hide on save
                $('#add-modal').modal('hide');
            });


            function showEditSymptomsModal() {
                @if ($appointment)
                    @this.symptoms = @js($appointment->symptoms);
                @endif
                $('#edit-symptoms-modal').modal('show');
            }

            // $('#drug_name').focus(function(){
            //     $('#drug_id').click();
            // });
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

            window.Echo.channel('current-appointment')
                .listen('.refresh', (e) => {
                    @this.changeCurrentAppointment();
                });
        </script>
    @endpush

    @push('styles')
        <style>
            .card-title {
                font-size: 15px;
            }

            .drug-recipe::marker {
                content: 'R/ ';
                font-size: 24px;
                font-style: italic;
                font-weight: 500;
            }
        </style>
    @endpush

</div>
