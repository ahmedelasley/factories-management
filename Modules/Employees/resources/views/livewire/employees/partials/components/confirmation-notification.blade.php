<!-- Start Delete modal -->
<div wire:ignore.self class="modal fade" id="{{ $idModal ?? ''  }}"  >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ $modalTitle ?? __( 'Title')  }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ $question ?? __( 'Question')  }}
                    </h4>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ $description ?? __( 'Description')  }}
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-danger" type="button" wire:loading.attr="disabled" wire:target="submit" wire:click="submit()">
                    {{ $buttonText ??  __( 'Yes') }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete modal -->
