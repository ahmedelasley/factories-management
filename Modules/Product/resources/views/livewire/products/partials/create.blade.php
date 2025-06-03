<!-- Start Create modal -->
<div wire:ignore.self class="modal fade" id="createModal" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Add', ['type' => __('Product')] ) }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form">

                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Name') }}</label>
                        <input class="form-control" type="text" name="name" wire:model.live='name' autofocus >
                        @error('name')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Description') }}</label>
                        <input class="form-control" type="text" name="description" wire:model.live='description' >
                        @error('description')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Storage Unit') }}</label>
                        <input class="form-control" type="text" name="storage_unit" wire:model.live='storage_unit' >
                        @error('storage_unit')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Ingredient Unit') }}</label>
                        <input class="form-control" type="text" name="ingredient_unit" wire:model.live='ingredient_unit' >
                        @error('ingredient_unit')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Conversion Factor') }}</label>
                        <input class="form-control" type="text" name="conversion_factor" wire:model.live='conversion_factor' >
                        @error('conversion_factor')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button" wire:loading.attr="disabled"  wire:target="submit" wire:click="submit()">
                    {{ __('Save' ) }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Create modal -->
