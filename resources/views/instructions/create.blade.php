<div wire:ignore.self class="modal fade" id="add-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent="store">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.add') @lang('all.instructions')</h4>
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
                        <select type="text" wire:model="type" name="type"
                            class="custom-select @error('type') is-invalid @enderror" placeholder="@lang('all.type')">
                            <option selected>@lang('all.type')</option>
                            <option value="instructions">@lang('all.instructions')</option>
                            <option value="forbiddens">@lang('all.forbiddens')</option>
                            <option value="warnings">@lang('all.warnings')</option>
                            <option value="diet">@lang('all.diet')</option>
                        </select>
                        @error('type')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea type="text" wire:model="list" name="list"
                            class="form-control @error('list') is-invalid @enderror" placeholder="@lang('all.list') @lang('all.instructions')"></textarea>
                        @error('list')
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
