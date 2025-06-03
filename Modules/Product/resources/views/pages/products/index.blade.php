
@extends('layouts.master')
@section('css')

<style>
.link-no-color:link {
  color: #fff;
}
</style>
@endsection
@section('title-header', __('Products'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Products') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('products.index')}}"><option value="" selected>{{ __('Products') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('product')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('Product')]) }}</b></button>
        @livewire('product::products.partials.create')
    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('product::products.get-data')
    </div>
    @livewire('product::products.partials.show', [], 'show_product_' . now()->timestamp )
    @livewire('product::products.partials.edit', [], 'edit_product_' . now()->timestamp )
    @livewire('product::products.partials.toggle-status', [], 'toggle_status_product_' . now()->timestamp)
    @livewire('product::products.partials.delete', [], 'delete_product_' . now()->timestamp )
@endsection
@section('js')
    <script>
        window.addEventListener('create-product-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-product-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-product-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-product-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-product-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
