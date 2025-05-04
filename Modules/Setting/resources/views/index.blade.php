
@extends('layouts.master')

@section('title-header', __('Setting'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Setting')}}</li>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-4 col-xl-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Settings</div>
            </div>
            <div class="main-content-left main-content-left-mail card-body pt-0 ">
                <div class="main-settings-menu">
                    <nav class="nav main-nav-column">
                        @foreach(\Modules\Setting\Enums\SettingType::cases() as $type)
                            <a class="nav-link thumb mb-2 {{ $current === $type ? 'active' : 'border-top-0' }}"
                            id="tab-{{ $type->value }}-tab"
                            data-bs-toggle="pill"
                            href="#tab-{{ $type->value }}"
                            role="tab"
                            aria-controls="tab-{{ $type->value }}"
                            aria-selected="{{ $current === $type ? 'true' : 'false' }}"
                            ><i class="{{ $type->icon() }}"></i> {{ $type->label() }} </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xl-9">
        <div class="card custom-card">
            <div class="card-header d-block">
                <div class="card-title mb-2">Overview</div>
                <p>Used to customize and manage all settngs about this Dashboard</p>
            </div>
        </div>
        <div class="row">
                
            @foreach ($settings as $key => $value)
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-start">
                                        <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary">{!! $value['icon'] !!}</div>
                                        <div class="d-flex flex-column  w-100">
                                            <p class="fs-20 fw-medium d-flex mb-0">{{ $value['key'] }}</p>
                                            <div class=" my-2">
                                                <form action="{{ route('settings.update', $value['id']) }}" class="d-flex justify-content-between " method="post">
                                                    <input type="{{ $value->data_type->inputType() }}" name="" class="form-control" value="{{ $value['key'] }}" placeholder="{{ $value['description'] }}">
                                                    <button class="btn btn-primary mx-2" type="button" id="button-addon2"><i class="fa fa-save"></i></button>
                                                </form>
                                            </div><!-- input-group -->
                                            <div>
                                                <p class="fs-13 text-muted mb-0">{{ $value['description'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-3 d-flex justify-content-between">
                            <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Go to Settings</a>
                            {{-- <label class="form-switch float-end mb-0">
                                <a href="javascript:void(0);" class="fs-14 mb-0 me-2 text-primary">Restore default</a>
                                <input type="checkbox" name="form-switch-checkbox3" class="form-switch-input">
                                <span class="form-switch-indicator custom-radius"></span>
                            </label> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
