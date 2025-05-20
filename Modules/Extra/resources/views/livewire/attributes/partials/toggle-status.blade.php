<!-- Start Toggle Status modal -->
<div wire:ignore.self class="modal fade" id="statusModal"  >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Update', ['type' => __('Status')]) }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Are you sure you want to update the status?') }}
                    </h4>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 text-center">
                        {{ __('This action will change the status of', ['type' => __('Attribute')]) }} <strong>{{ $attribute }}</strong> {{ __('to') }} <strong>{{ $status == "Active" ? __('Inactive') : __('Active') }}</strong>.
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button" wire:loading.attr="disabled" wire:target="submit" wire:click="submit()">
                    {{ __('Update', ['type' => __('Status')]) }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Toggle Status modal -->
