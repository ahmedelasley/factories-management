
@extends('layouts.master')
@section('css')

<style>
.link-no-color:link {
  color: #fff;
}
</style>
@endsection
@section('title-header', __('employees'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('employees') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('employees.index')}}"><option value="" selected>{{ __('employees') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('employee')]) }}"><b><i class="mdi mdi-plus"></i> ➕{{ __('Add', ['type' => __('employee')]) }}</b></button>
        @livewire('employees::employees.partials.create')

    </div>
@endsection

@section('content')
    <div class="row">
        @livewire('employees::employees.get-data')
    </div>
    @livewire('employees::employees.partials.show', [], 'show_employee_' . now()->timestamp )
    @livewire('employees::employees.partials.edit', [], 'edit_employee_' . now()->timestamp )
    {{-- @livewire('employees::employees.partials.toggle-status', [], 'toggle_status_employee_' . now()->timestamp) --}}
    @livewire('employees::employees.partials.delete', [], 'delete_employee_' . now()->timestamp )
    @livewire('employees::employees.partials.restore', [], 'restore_employee_' . now()->timestamp )
    @livewire('employees::employees.partials.force-delete', [], 'force_delete_employee_' . now()->timestamp )
@endsection
@section('js')
    <script>
        window.addEventListener('create-employee-modal', event => {
            $('#createModal').modal('toggle');
        })
        window.addEventListener('show-employee-modal', event => {
            $('#showModal').modal('toggle');
        })
        window.addEventListener('edit-employee-modal', event => {
            $('#editModal').modal('toggle');
        })
        window.addEventListener('toggle-status-employee-modal', event => {
            $('#statusModal').modal('toggle');
        })
        window.addEventListener('delete-employee-modal', event => {
            $('#deleteModal').modal('toggle');
        })
        window.addEventListener('restore-employee-modal', event => {
            $('#restoreModal').modal('toggle');
        })
        window.addEventListener('force-delete-employee-modal', event => {
            $('#forceDeleteModal').modal('toggle');
        })
    </script>
@endsection
