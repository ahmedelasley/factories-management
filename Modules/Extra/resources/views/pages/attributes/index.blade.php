
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
            <a href="{{ route('attributes.index')}}"><option value="" selected>{{ __('Attributes') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
            <a href="{{ route('values.index')}}"><option value="">{{ __('Values') }}</option></a>
            <a href="{{ route('extras.index')}}"><option value="">{{ __('Attachments') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><b><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</b></button>
        @livewire('extra::attributes.partials.create')
    </div>
@endsection

@section('content')
<div class="row">
    @livewire('extra::attributes.get-data')
</div>
@livewire('extra::attributes.partials.show', [], 'show_attribute_' . now()->timestamp )
@livewire('extra::attributes.partials.edit', [], 'edit_attribute_' . now()->timestamp )
@livewire('extra::attributes.partials.toggle-status', [], 'toggle_status_attribute_' . now()->timestamp )
@livewire('extra::attributes.partials.delete', [], 'delete_attribute_' . now()->timestamp )
@livewire('extra::attributes.partials.detach', [], 'detach_attribute_' . now()->timestamp )
@livewire('extra::attributes.partials.attach', [], 'attach_attribute_' . now()->timestamp )

@endsection
@section('js')
<script>

			window.addEventListener('create-attribute-modal', event => {
				$('#createModal').modal('toggle');
			})
            window.addEventListener('show-attribute-modal', event => {
				$('#showModal').modal('toggle');
			})
            window.addEventListener('edit-attribute-modal', event => {
				$('#editModal').modal('toggle');
			})
            window.addEventListener('toggle-status-attribute-modal', event => {
				$('#statusModal').modal('toggle');
			})
            window.addEventListener('delete-attribute-modal', event => {
				$('#deleteModal').modal('toggle');
			})
            window.addEventListener('attach-attribute-modal', event => {
				$('#attachModal').modal('toggle');
			})
            window.addEventListener('detach-attribute-modal', event => {
				$('#detachModal').modal('toggle');
			})


</script>
@endsection
