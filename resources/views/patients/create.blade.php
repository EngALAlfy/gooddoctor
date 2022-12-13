<div wire:ignore.self class="modal fade" id="add-patient-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent="store">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.add') @lang('all.patients')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" wire:model="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="@lang('all.name')">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="number" wire:model="age" name="age"
                            class="form-control @error('age') is-invalid @enderror" placeholder="@lang('all.age')">
                        @error('age')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model="address" name="address"
                            class="form-control @error('address') is-invalid @enderror" placeholder="@lang('all.address')">
                        @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select wire:model="sex" name="sex" class="form-control @error('sex') is-invalid @enderror"
                            placeholder="@lang('all.sex')">
                            <option >@lang('all.sex')</option>
                            <option value="male">@lang('all.male')</option>
                            <option value="female">@lang('all.female')</option>
                        </select>
                        @error('sex')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model="phone" name="phone"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="@lang('all.phone')">
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea type="text" wire:model="info" name="info" class="form-control @error('info') is-invalid @enderror"
                            placeholder="@lang('all.info')"></textarea>
                        @error('info')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('all.cancel')</button>
                    <button type="submit" class="btn btn-primary">
                        @lang('all.save')
                    </button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
