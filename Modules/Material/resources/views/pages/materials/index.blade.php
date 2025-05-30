
@extends('layouts.master')
@section('css')

<style>
.link-no-color:link {
  color: #fff;
}
</style>
@endsection
@section('title-header', __('Materials'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Materials') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('materials.index')}}"><option value="" selected>{{ __('Materials') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('material')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('Material')]) }}</b></button>
        @livewire('material::materials.partials.create')
    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('material::materials.get-data')
    </div>
    @livewire('material::materials.partials.show', [], 'show_material_' . now()->timestamp )
    @livewire('material::materials.partials.edit', [], 'edit_material_' . now()->timestamp )
    @livewire('material::materials.partials.toggle-status', [], 'toggle_status_material_' . now()->timestamp)
    @livewire('material::materials.partials.delete', [], 'delete_material_' . now()->timestamp )
@endsection
@section('js')
    <script>
        window.addEventListener('create-material-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-material-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-material-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-material-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-material-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
