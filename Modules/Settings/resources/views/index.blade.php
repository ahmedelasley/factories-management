
@extends('layouts.master')

@section('title-header', __('Profile'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Profile')}}</li>
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
                        <a class="nav-link thumb active mb-2" href="javascript:void(0);"><i class="fe fe-home"></i> Main </a>
                        <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i class="fe fe-grid"></i> Web Apps</a>
                        <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i class="fe fe-server"></i> General</a>
                        <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i class="fe fe-globe"></i> Components</a>
                        <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i class="fe fe-layers"></i> Pages</a>
                        <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i class="fe fe-flag"></i> Language &amp; Region</a>
                        <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i class="fe fe-bell"></i> Notifications</a>
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
            {{-- {{ $key[$type] }}
            @if ($type[$key] === 0) --}}
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-start">
                                    <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary">{!! $value['icon'] !!}</div>
                                    <div class="d-flex flex-column  w-100">
                                        <p class="fs-20 fw-medium d-flex mb-0">{{ $value['key'] }}</p>
                                        <div class="input-group my-2">
                                            <form action="{{ route('settings.update', $value['id']) }}" method="post">
                                                {{-- <input type="text" class="form-control" placeholder="Search for..." > --}}
                                                <input type="{{ $value['data_type'] == 'email' ? 'email' : 'text' }}" name="" class="form-control" placeholder="{{ $value['description'] }}">
                                                <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-save"></i></button>
                                            </form>
										</div><!-- input-group -->
                                        <div>
                                            <p class="fs-13 text-muted mb-0">Dashboard Settings such as sidemenu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-3 d-flex justify-content-between">
                        <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Go to Settings</a>
                        <label class="form-switch float-end mb-0">
                            <a href="javascript:void(0);" class="fs-14 mb-0 me-2 text-primary">Restore default</a>
                            <input type="checkbox" name="form-switch-checkbox3" class="form-switch-input">
                            <span class="form-switch-indicator custom-radius"></span>
                        </label>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary"><i class="fe fe-grid"></i></div>
                                    <div>
                                        <p class="fs-20 fw-medium d-flex mb-0">Webapps</p>
                                        <p class="fs-13 text-muted mb-0">Web apps settings such as Apps,Elements,Advanced Ui &amp; Mail can be Controlled.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-3 d-flex justify-content-between">
                        <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Go to Settings</a>
                        <label class="form-switch float-end mb-0">
                            <a href="javascript:void(0);" class="fs-14 mb-0 me-2 text-primary">Restore default</a>
                            <input type="checkbox" name="form-switch-checkbox3" class="form-switch-input">
                            <span class="form-switch-indicator custom-radius"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary"><i class="fe fe-server"></i></div>
                                    <div> <p class="fs-20 fw-medium d-flex mb-0">General</p>
                                        <p class="fs-13 text-muted mb-0">General settings such as Icons,Charts,Ecommerce can be Controlled.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-3 d-flex justify-content-between">
                        <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Go to Settings</a>
                        <label class="form-switch float-end mb-0">
                            <a href="javascript:void(0);" class="fs-14 mb-0 me-2 text-primary">Restore default</a>
                            <input type="checkbox" name="form-switch-checkbox3" class="form-switch-input" checked="">
                            <span class="form-switch-indicator custom-radius"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary"><i class="fe fe-flag"></i></div>
                                    <div>
                                        <p class="fs-20 fw-medium d-flex mb-0">Region &amp; language</p>
                                        <p class="fs-13 text-muted mb-0">In this settings we can change the region and language manually.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-3 d-flex justify-content-between">
                        <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Go to Settings</a>
                        <label class="form-switch float-end mb-0">
                            <a href="javascript:void(0);" class="fs-14 mb-0 me-2 text-primary">Restore default</a>
                            <input type="checkbox" name="form-switch-checkbox3" class="form-switch-input">
                            <span class="form-switch-indicator custom-radius"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary"><i class="fe fe-bell"></i></div>
                                    <div>
                                        <p class="fs-20 fw-medium d-flex mb-0">Notifiation</p>
                                        <p class="fs-13 text-muted mb-0">Notification settings we can control the notification privacy and security.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-3 d-flex justify-content-between">
                        <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Go to Settings</a>
                        <label class="form-switch float-end mb-0">
                            <a href="javascript:void(0);" class="fs-14 mb-0 me-2 text-primary">Restore default</a>
                            <input type="checkbox" name="form-switch-checkbox3" class="form-switch-input">
                            <span class="form-switch-indicator custom-radius"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="mr-3 btn-icon rounded-50 bg-gray-100 p-4 text-primary"><i class="fe fe-settings"></i></div>
                                    <div>
                                        <p class="fs-20 fw-medium d-flex mb-0">Blog</p>
                                        <p class="fs-13 text-muted mb-0">In this settings we can modify all Blog related settings in this template.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-3 d-flex justify-content-between">
                        <a href="javascript:void(0);" class="fs-14 mb-0 text-primary">Go to Settings</a>
                        <label class="form-switch float-end mb-0">
                            <a href="javascript:void(0);" class="fs-14 mb-0 me-2 text-primary">Restore default</a>
                            <input type="checkbox" name="form-switch-checkbox3" class="form-switch-input" checked="">
                            <span class="form-switch-indicator custom-radius"></span>
                        </label>
                    </div>
                </div>
            </div> --}}
            {{-- @endif --}}
            @endforeach
        </div>
    </div>
</div>
@endsection
