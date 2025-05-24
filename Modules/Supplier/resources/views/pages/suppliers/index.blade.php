
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
            <a href="{{ route('suppliers.index')}}"><option value="" selected>{{ __('Suppliers') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('Supplier')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('Supplier')]) }}</b></button>
        @livewire('supplier::suppliers.partials.create')
    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('supplier::suppliers.get-data')
    </div>
    @livewire('supplier::suppliers.partials.show', key('show_supplier' . now()->timestamp ))
    @livewire('supplier::suppliers.partials.edit', key('edit_supplier' . now()->timestamp ))
    @livewire('supplier::suppliers.partials.toggle-status', key('toggle_status_supplier' . now()->timestamp))
    @livewire('supplier::suppliers.partials.delete', key('delete_supplier' . now()->timestamp))
@endsection
@section('js')
    <script>
        window.addEventListener('create-supplier-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-supplier-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-supplier-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-supplier-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-supplier-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
