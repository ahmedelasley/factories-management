
@extends('layouts.master')

@section('title-header', __('Setting'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Setting')}}</li>
@endsection


@section('content')

<div class="row" x-data="{ settingTab: '{{ $current }}' }">
    <div class="col-lg-4 col-xl-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Settings</div>
            </div>
            <div class="main-content-left main-content-left-mail card-body pt-0 ">
                <div class="main-settings-menu">
                    <nav class="nav main-nav-column">
                        @foreach(\Modules\Setting\Enums\SettingType::cases() as $type)
                            {{-- <a class="nav-link thumb mb-2 {{ $current === $type ? 'active' : 'border-top-0' }}"
                            id="tab-{{ $type->value }}-tab"
                            data-bs-toggle="pill"
                            href="#tab-{{ $type->value }}"
                            role="tab"
                            aria-controls="tab-{{ $type->value }}"
                            aria-selected="{{ $current === $type ? 'true' : 'false' }}"
                            ><i class="{{ $type->icon() }}"></i> {{ $type->label() }} </a> --}}


                            <a class="nav-link thumb mb-2"
                                href="javascript:void(0);" :class="{'active' : settingTab === '{{$type}}' }" @click.prevent="settingTab = '{{$type}}'"
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

            @foreach ($settings as $setting)
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 p-2"  x-show="settingTab === '{{ $setting['type'] }}' ">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @livewire('setting::setting.edit', ['setting' => $setting, key('toggle-'.$setting['id'])])


                            </div>
                        </div>
                        <div class="card-footer p-3 d-flex justify-content-between">
                            <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Restore {{ $setting['status'] }}</a>
                            {{-- <div class="check-box">
                                <input
                                  type="checkbox"
                                  name="active"
                                  {{ $value['status']->isActive() ? 'checked' : '' }}
                                >
                            </div> --}}
                            @livewire('setting::setting.toggle-status', ['setting' => $setting, key('toggle-'.$setting['id'])])


                            {{-- <livewire:setting::setting.toggle-status
                                :setting="$value"
                                /> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
