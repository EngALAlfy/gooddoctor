<div wire:ignore.self class="modal fade" id="add-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('all.add') @lang('all.appointment_types')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <input type="text" wire:model="name" name="name" class="form-control"
                            placeholder="@lang('all.name')">


                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                        <input type="number" wire:model="price" name="price" class="form-control"
                            placeholder="@lang('all.price')">


                    @error('price')
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

