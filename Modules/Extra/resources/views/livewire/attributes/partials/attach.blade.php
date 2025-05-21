<!-- Start Attach modal -->
<div wire:ignore.self class="modal fade" id="attachModal"  >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Attach') }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Select the items you want to attach.') }}
                    </h4>
                    <h6 class="mt-3">{{ __('Values') }} :
                        <div class="row d-flex justify-content-center flex-wrap">
                            @forelse ($values as $key => $value)
                                <div class="col-xs-4 col-sm-4 col-md-3 mt-1">
                                    <label class="ckbox"><input type="checkbox" wire:model.live="valueIds" @if(in_array($key, $valueIds)) checked @endif  value="{{ $key }}"><span>{{ $value }}</span></label>
                                </div>
                            @empty
                                <h6 class="text-muted">{{ __('No Values')}}</h6>
                            @endforelse
                        </div>
                    </h6>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button" wire:loading.attr="disabled" wire:target="submit" wire:click="submit()">
                    {{ __('Yes') }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Attach modal -->
