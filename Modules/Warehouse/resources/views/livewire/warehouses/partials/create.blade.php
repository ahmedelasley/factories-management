<!-- Start Create modal -->
<div wire:ignore.self class="modal fade" id="createModal" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Add', ['type' => __('Warehouse')] ) }}</h6>
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
                        <label class="main-content-label tx-12 tx-medium">{{ __('Warehouse Type') }}</label>
                        <select class="form-control" wire:model.live="type">
                            <option value="" selected hidden>{{ __('Select Type') }}</option>
                            @foreach ($types as $enum)
                                <option value="{{ $enum->value }}">{{ $enum->label() }}</option>
                            @endforeach
                        </select>
                        @error('type')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Location') }}</label>
                        <input class="form-control" type="text" name="location" wire:model.live='location' >
                        @error('location')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="main-content-label tx-12 tx-medium">{{ __('Capacity') }}</label>
                        <input class="form-control" type="text" name="capacity" wire:model.live='capacity' >
                        @error('capacity')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
{{-- <div class="form-group" wire:ignore>
    <label class="main-content-label tx-12 tx-medium">{{ __('Employee') }}</label>
    <select class="form-control" id="employee-select">
        <option value="">{{ __('Select Employee') }}</option>
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
        @endforeach
    </select>
    @error('employeeable_id')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
</div> --}}
                    @if (! $hasDefaultWarehouse)
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label" for="is_default">{{ __('Default Warehouse') }}</label>
                            <input class="form-check-input" type="checkbox" id="is_default" wire:model.live="is_default">
                        </div>
                        @error('is_default')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                    </div>
                    @endif
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

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        let select = document.getElementById('employee-select');

        const tom = new TomSelect(select, {
            create: false,
            placeholder: '🔍 ابحث عن الموظف...',
        });

        select.addEventListener('change', function () {
            @this.set('employeeable_id', this.value);
        });

        Livewire.hook('message.processed', () => {
            if (!select.tomselect) {
                new TomSelect(select);
            }
        });
    });
</script>
@endpush

