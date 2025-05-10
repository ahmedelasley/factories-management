
@extends('layouts.master')

@section('title-header', __('Extras'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Extras') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Attributes')}}</li>
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ __('Extras') }}</h4>
                <p class="text-muted font-14 mb-4">
                    {{ __('Extras') }}
                </p>
                @livewire('extra::attributes.index')
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
