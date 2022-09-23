<div wire:ignore.self class="modal fade" id="delete-modal">
    <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.delete') @lang('all.tests')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('all.are_you_sure')
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('all.no')</button>
                    <button wire:click.prevent="delete" data-dismiss="modal" type="button" class="btn btn-primary">
                        @lang('all.yes')
                    </button>
                </div>
            </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
