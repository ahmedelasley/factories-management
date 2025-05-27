
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
            <a href="{{ route('extras.index')}}"><option value="">{{ __('Categories') }}</option></a>
            <a href="{{ route('attributes.index')}}"><option value="">{{ __('Attributes') }} </option></a>
            <a href="{{ route('values.index')}}"><option value="" selected>{{ __('Values') }}</option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
            <a href="{{ route('extras.index')}}"><option value="">{{ __('Attachments') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('Value')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('Value')]) }}</b></button>
        @livewire('extra::values.partials.create')
    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('extra::values.get-data')
    </div>
    @livewire('extra::values.partials.show', [], 'show_value_' . now()->timestamp )
    @livewire('extra::values.partials.edit', [], 'edit_value_' . now()->timestamp )
    @livewire('extra::values.partials.toggle-status', [], 'toggle_status_value_' . now()->timestamp )
    @livewire('extra::values.partials.delete', [], 'delete_value_' . now()->timestamp )
@endsection
@section('js')
    <script>
        window.addEventListener('create-value-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-value-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-value-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-value-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-value-modal', event => {
            $('#deleteModal').modal('toggle');
        })
    </script>
@endsection
