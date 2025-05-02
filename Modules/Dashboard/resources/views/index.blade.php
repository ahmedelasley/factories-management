@extends('layouts.master')

@section('title-header', __('Dashboard'))
@section('nav-header')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
@endsection


@section('content')
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0 pb-0">Card title</h5>
            </div>
            <div class="card-body">
                {{ __("You're logged in!?") }}
            </div>
            <div class="card-footer">
                Card footer
            </div>
        </div>
    </div>
</div>

@endsection
