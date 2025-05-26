<!-- Start Edit modal -->
<div wire:ignore.self class="modal fade" id="editModal"  >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Edit', ['type' => __('Company')] ) }}</h6>
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
                        <label class="main-content-label tx-12 tx-medium">{{ __('Email') }}</label>
                        <input class="form-control" type="text" name="email" wire:model.live='email' >
                        @error('email')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Phone') }}</label>
                        <input class="form-control" type="text" name="phone" wire:model.live='phone' >
                        @error('phone')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Address') }}</label>
                        <input class="form-control" type="text" name="address" wire:model.live='address' >
                        @error('address')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Suppliers') }}</label>
                        <select wire:model.live="supplier_id" class="form-control" id="supplier_id">
                            <option disabled value="">{{ __('Select a Supplier...') }}</option>
                            <option value="" wire:key="supplier-none">None</option>
                            @forelse ($data as $value)
                                <option value="{{ $value->id }}" wire:key="supplier-{{ $value->id }}" {{ old('supplier_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                            @empty
                                <option value="0" wire:key="supplier-none">None</option>
                            @endforelse
                        </select>
                        @error('supplier_id')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Notes') }}</label>
                        <input class="form-control" type="text" name="notes" wire:model.live='notes' >
                        @error('notes')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-success" type="button" wire:loading.attr="disabled" wire:target="submit"  wire:click="submit()">
                    {{ __('Update') }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit modal -->
