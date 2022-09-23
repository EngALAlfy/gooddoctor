<div class="modal fade" id="add-modal">
    <div class="modal-dialog">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.add') @lang('all.tests')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="@lang('all.name')">

                    </div>

                    <div class="form-group">
                            <input type="text" name="ar_name" class="form-control" placeholder="@lang('all.ar_name')">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('all.cancel')</button>
                    <button wire:click.prevent="store" data-dismiss="modal" type="button" class="btn btn-primary">
                        @lang('all.save')
                    </button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
