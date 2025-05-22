
@extends('layouts.master')
@section('css')

<style>
.link-no-color:link {
  color: #fff;
}
</style>
@endsection
@section('title-header', __('Extras'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Extras') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('categories.index')}}"><option value="" selected>{{ __('Categories') }}</option></a>
            <a href="{{ route('attributes.index')}}"><option value="">{{ __('Attributes') }} </option></a>
            <a href="{{ route('values.index')}}"><option value="">{{ __('Values') }}</option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
            <a href="{{ route('extras.index')}}"><option value="">{{ __('Attachments') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('Category')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('Category')]) }}</b></button>
        @livewire('extra::categories.partials.create')
    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('extra::categories.get-data')
    </div>
    @livewire('extra::categories.partials.show', key('show_category' . now()->timestamp ))
    @livewire('extra::categories.partials.edit', key('edit_category' . now()->timestamp ))
    @livewire('extra::categories.partials.toggle-status', key('toggle_status_category' . now()->timestamp))
    @livewire('extra::categories.partials.delete', key('delete_category' . now()->timestamp))
@endsection
@section('js')
    <script>
        window.addEventListener('create-category-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-category-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-category-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-category-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-category-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
