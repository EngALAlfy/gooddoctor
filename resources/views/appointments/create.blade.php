<div wire:ignore.self class="modal fade" id="add-appointment-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('all.add') @lang('all.appointments')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">

                        <input type="text" wire:model="patient_name" name="patient_name" class="form-control"
                            placeholder="@lang('all.search') @lang('all.patient')">

                        <div class="input-group-append">
                            <button data-toggle="modal" data-target="#add-patient-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <select size="5" class="custom-select @error('patient_id') is-invalid @enderror"
                        name="patient_id" wire:model="patient_id" id="patient_id">
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <select wire:model="appointment_type_id" name="appointment_type_id"
                        class="custom-select @error('appointment_type_id') is-invalid @enderror"
                        placeholder="@lang('all.appointment_type')">
                        <option>@lang('all.appointment_type')</option>
                        @foreach ($appointment_types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }} - {{ $type->price }}</option>
                        @endforeach
                    </select>

                    @error('appointment_type_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea rows="3" wire:model="symptoms" name="symptoms"
                        class="form-control @error('symptoms') is-invalid @enderror" placeholder="@lang('all.symptoms')"></textarea>

                    @error('symptoms')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea rows="3" wire:model="info" name="info" class="form-control @error('info') is-invalid @enderror"
                        placeholder="@lang('all.info')"></textarea>

                    @error('info')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input id="date" type="date"  wire:model="date"
                            class="form-control @error('date') is-invalid @enderror" placeholder="@lang('all.date')">

                        @error('date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('all.cancel')</button>
                <button wire:click="store" class="btn btn-primary">
                    @lang('all.save')
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- @push('styles')
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js') }}">
    </script>
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    </script>
@endpush --}}
