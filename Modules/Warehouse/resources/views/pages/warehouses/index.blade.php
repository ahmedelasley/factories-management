
@extends('layouts.master')
@section('css')

<style>
    .link-no-color:link {
        color: #fff;
    }
    /* .check-box {
        transform: scale(0);
    } */
    .check-box input[type="checkbox"] {
        position: relative;
        appearance: none;
        width: 20px;
        height: 10px;
        background: #ccc;
        border-radius: 10%;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: 0.4s;
    }

    .check-box input:checked[type="checkbox"] {
        background: #0162e8;
    }

    .check-box input[type="checkbox"]::after {
        position: absolute;
        content: "";
        width: 10px;
        height: 10px;
        top: 0;
        left: 0;
        background: #fff;
        border-radius: 10%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transform: scale(1.1);
        transition: 0.4s;
    }

    .check-box input:checked[type="checkbox"]::after {
        left: 100%;
    }
</style>
@endsection
@section('title-header', __('Warehouses'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Warehouses') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('warehouses.index')}}"><option value="" selected>{{ __('Warehouses') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('Warehouse')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('Warehouse')]) }}</b></button>
        @livewire('warehouse::warehouses.partials.create')
    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('warehouse::warehouses.get-data')
    </div>
    @livewire('warehouse::warehouses.partials.show', [], 'show_warehouse_' . now()->timestamp )
    @livewire('warehouse::warehouses.partials.edit', [], 'edit_warehouse_' . now()->timestamp )
    @livewire('warehouse::warehouses.partials.toggle-status', [], 'toggle_status_warehouse_' . now()->timestamp)
    @livewire('warehouse::warehouses.partials.delete', [], 'delete_warehouse_' . now()->timestamp )
@endsection
@section('js')
    <script>
        window.addEventListener('create-warehouse-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-warehouse-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-warehouse-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-warehouse-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-warehouse-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
