<!-- Start Show modal -->
<div wire:ignore.self class="modal fade" id="showModal"  >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Details') }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between form-control" readonly>
                    <h4 class="">{{ $model?->attribute }}</h4>
                    <h6 class="{{ $model?->status->textColor() }}"> <div class="dot-label {{ $model?->status->bgColor() }} ms-5" ></div><span>{{ $model?->status->label() }}</span></h6>
                </div>
                <h6 class="mt-3">{{ __('Values') }} :
                    <div class="d-flex justify-content-center flex-wrap">
                        @forelse ($values as $item)
                            <span class="badge badge-primary m-1 text-bold">{{ $item->value }}</span>
                        @empty
                            <h6 class="text-muted">{{ __('No Values')}}</h6>
                        @endforelse
                    </div>
                </h6>


            </div>
            <div class="modal-footer  d-flex justify-content-between flex-wrap">
                {{-- <div class="d-flex justify-content-between ">
                    <h6>{{ __('Creator By') }}</h6>
                    <h6>{{ __('Editor By') }}</h6>                    
                </div> --}}
                {{-- <div class="d-flex justify-content-between"> --}}
                    <div>
                        <h6>{{ __('Creator By') }}</h6>
                        <h6 class="text-muted">{{ $model?->creator?->name }} : {{ $model?->created_at?->diffForHumans() }}</h6>
                    </div>
                    <div>
                        <h6>{{ __('Editor By') }}</h6>
                        <h6 class="text-muted">{{ $model?->editor?->name }} : {{ $model?->updated_at?->diffForHumans() }}</h6>
                    </div>
                {{-- </div> --}}



                {{-- <button class="btn ripple btn-primary" type="button" wire:loading.attr="disabled" wire:target="submit" wire:click="submit()">
                    {{ __('Update', ['type' => __('Status')]) }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button> --}}
                {{-- <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Show modal -->
