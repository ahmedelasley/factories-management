
@extends('layouts.master')
@section('css')

<style>
.link-no-color:link {
  color: #fff;
}
</style>
@endsection
@section('title-header', __('Suppliers'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Suppliers') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('suppliers.index')}}"><option value="">{{ __('Suppliers') }}</option></a>
            <a href="{{ route('companies.index')}}"><option value="" selected>{{ __('Companies') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('Supplier')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('Supplier')]) }}</b></button>
        @livewire('supplier::companies.partials.create')
    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('supplier::companies.get-data')
    </div>
    @livewire('supplier::companies.partials.show', [], 'show_company_' . now()->timestamp )
    @livewire('supplier::companies.partials.edit', [], 'edit_company_' . now()->timestamp )
    @livewire('supplier::companies.partials.toggle-status', [], 'toggle_status_company_' . now()->timestamp )
    @livewire('supplier::companies.partials.delete', [], 'delete_company_' . now()->timestamp )
@endsection
@section('js')
    <script>
        window.addEventListener('create-company-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-company-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-company-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-company-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-company-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
