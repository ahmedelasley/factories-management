
@extends('layouts.master')
@section('css')
    {{-- <link href="{{ URL::asset('assets/back/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> --}}
    @if (App::getLocale() == 'ar')
        <link href="{{URL::asset('assets/back/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{URL::asset('assets/back/plugins/treeview/treeview.css')}}" rel="stylesheet" type="text/css" />
    @endif

<style>
.link-no-color:link {
  color: #fff;
}
</style>
@endsection
@section('title-header', __('departments'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('departments') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('departments.index')}}"><option value="" selected>{{ __('departments') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('department')]) }}"><b><i class="mdi mdi-plus"></i> ➕{{ __('Add', ['type' => __('department')]) }}</b></button>
        {{-- @livewire('departments::departments.partials.create') --}}

    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('departments::departments.get-data')
    </div>
    {{-- @livewire('departments::departments.partials.show', [], 'show_department_' . now()->timestamp )
    @livewire('departments::departments.partials.edit', [], 'edit_department_' . now()->timestamp ) --}}
    {{-- @livewire('departments::departments.partials.toggle-status', [], 'toggle_status_department_' . now()->timestamp) --}}
    {{-- @livewire('departments::departments.partials.delete', [], 'delete_department_' . now()->timestamp )
    @livewire('departments::departments.partials.restore', [], 'restore_department_' . now()->timestamp )
    @livewire('departments::departments.partials.force-delete', [], 'force_delete_department_' . now()->timestamp ) --}}
@endsection

@section('js')
    <script src="{{URL::asset('assets/back/plugins/treeview/treeview.js')}}"></script>
    <script>
        window.addEventListener('create-department-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-department-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-department-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-department-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-department-modal', event => {
            $('#deleteModal').modal('toggle');
        })
        window.addEventListener('restore-department-modal', event => {
            $('#restoreModal').modal('toggle');
        })
        window.addEventListener('force-delete-department-modal', event => {
            $('#forceDeleteModal').modal('toggle');
        })
    </script>
@endsection
