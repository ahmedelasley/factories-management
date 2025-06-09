<!-- Start Modal -->
<div wire:ignore.self class="modal fade" id="{{ $idModal ?? ''  }}" >
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ $modalTitle ?? __( 'Add/Edit')  }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button" wire:click="close()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form">

                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Name') }}</label>
                            <input wire:model.live="name" type="text" class="form-control" autofocus>
                            @error('name')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Email') }}</label>
                            <input wire:model.live="email" type="email" class="form-control">
                            @error('email')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Phone') }}</label>
                            <input wire:model.live="phone" type="text" class="form-control">
                            @error('phone')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Gender') }}</label>
                            <select wire:model.live="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('National ID') }}</label>
                            <input wire:model.live="national_id" type="text" class="form-control">
                            @error('national_id')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>

                        <div class="cform-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Hire Date') }}</label>
                            <input wire:model.live="hire_date" type="date" class="form-control">
                            @error('hire_date')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>

                        {{-- <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Department') }}</label>
                            <select wire:model.live="department_id" class="form-control">
                                <option value="">-- Select Department --</option>
                                @foreach($departments as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div> --}}

                        {{-- <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Position') }}</label>
                            <select wire:model.live="position_id" class="form-control">
                                <option value="">-- Select Position --</option>
                                @foreach($positions as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('position_id')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div> --}}

                        <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Status') }}</label>
                            <select wire:model.live="status" class="form-control">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->value }}">{{ ucfirst($status->value) }}</option>
                                @endforeach
                            </select>
                            @error('status')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label class="main-content-label tx-12 tx-medium">{{ __('Photo') }}</label>
                            <input wire:model="photo" type="file" class="form-control">
                            @error('photo')<span class="bg-danger tx-white d-block px-1 py-1">{{ $message }}</span>@enderror
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button" wire:loading.attr="disabled"  wire:target="submit" wire:click="submit()">
                    {{ $buttonText ??  __( 'Submit') }}
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm text-white" role="status">
                </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button" wire:click="close()">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End modal -->
