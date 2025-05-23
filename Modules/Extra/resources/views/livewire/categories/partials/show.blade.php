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
                    <h4 class="">{{ $model?->name }}</h4>
                    <h6 class="{{ $model?->status->textColor() }}"> <div class="dot-label {{ $model?->status->bgColor() }} ms-5" ></div><span>{{ $model?->status->label() }}</span></h6>
                </div>
                {{-- <h6 class="mt-3">{{ __('Attributes') }} :
                    <div class="d-flex justify-content-center flex-wrap">
                        @forelse ($valueAttributes as $item)
                            <span class="badge badge-primary m-1 text-bold">{{ $item->attribute }}</span>
                        @empty
                            <h6 class="text-muted">{{ __('No Attributes')}}</h6>
                        @endforelse
                    </div>
                </h6> --}}
            </div>
            <div class="modal-footer d-flex justify-content-between flex-wrap">
                <div>
                    <h6>{{ __('Creator By') }}</h6>
                    <h6 class="text-muted">{{ $model?->creator?->name }} : {{ $model?->created_at?->diffForHumans() }}</h6>
                </div>
                <div>
                    <h6>{{ __('Editor By') }}</h6>
                    <h6 class="text-muted">{{ $model?->editor?->name }} : {{ $model?->updated_at?->diffForHumans() }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Show modal -->
