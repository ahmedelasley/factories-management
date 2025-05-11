
@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/back/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/back/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/back/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/back/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/back/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/back/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title-header', __('Extras'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Extras') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Attributes')}}</li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-plus"></i></button>
    </div>
@endsection

@section('content')
<div class="row">
    @livewire('extra::attributes.index')          
</div>

@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/back/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/back/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/back/js/table-data.js')}}"></script>
@endsection
