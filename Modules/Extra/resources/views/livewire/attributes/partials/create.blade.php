<!-- Create modal -->
<div wire:ignore.self class="modal fade" id="createModal" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Add', ['type' => __('attribute')]) }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form" >

                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Attribute') }}</label>
                        <input class="form-control" type="text" name="name" wire:model.lazy='attribute' >
                        @error('attribute')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    {{-- <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('modal.Description') }}</label>
                        <input class="form-control" type="text" name="description" wire:model='description' >
                        @error('description')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button" wire:click="store()">{{ __('Save', ['type' => __('Attribute')]) }}</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Create modal -->