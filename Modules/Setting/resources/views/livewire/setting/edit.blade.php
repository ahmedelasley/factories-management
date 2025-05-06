
<div class="col-lg-12">
    <div class="d-flex justify-content-start">
        <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary">{!! $setting['icon'] !!}</div>
        <div class="d-flex flex-column  w-100">
            <p class="fs-20 fw-medium d-flex mb-0">{{ $setting['key'] }}</p>
            <div class=" my-2">
                <form action="{{ route('settings.update', $setting['id']) }}" class="d-flex justify-content-between " method="post">
                    <input type="{{ $setting->data_type->inputType() }}" name="" wire:model.blur="value" wire:keydown.enter.prevent="edit" class="form-control" value="{{ $setting['key'] }}" placeholder="{{ $setting['description'] }}">
                    <button class="btn btn-primary mx-2" type="button" id="button-addon2"  wire:click="edit()" ><i class="fa fa-save"></i></button>
                </form>
            </div><!-- input-group -->
            <div>
                @error('value')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
</div>

