
@extends('layouts.master')
@section('css')

<style>
.link-no-color:link {
  color: #fff;
}
</style>
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
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('extras.index')}}"><option value="">{{ __('Categories') }}</option></a>
            <a href="{{ route('attributes.index')}}"><option value="" selected>{{ __('Attributes') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
            <a href="{{ route('extras.index')}}"><option value="">{{ __('Values') }}</option></a>
            <a href="{{ route('extras.index')}}"><option value="">{{ __('Attachments') }}</option></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#createModal" data-placement="top" data-toggle="tooltip" title=" {{ __('Add', ['type' => __('attribute')]) }}"><i class="mdi mdi-plus"></i> {{ __('Add', ['type' => __('attribute')]) }}</button>
        @livewire('extra::attributes.partials.create')
    </div>
@endsection

@section('content')
<div class="row">
    @livewire('extra::attributes.get-data')          
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
<script>
    $(function(e) {
        var table = $('#custom-table').DataTable({

            responsive: true,

            language: {
                searchPlaceholder:"{{ __('Search') }}.....",
                // sSearch: '',
                // lengthMenu: '_MENU_',
                url: "{{ asset('lang/datatable/' . app()->getLocale() . '.json') }}"
            }
        }); 


        $('#custom-table tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });

</script>  

<script>
    
			window.addEventListener('close-modal', event => {
				$('#createModal').modal('toggle');
				// $('#editModal').modal('toggle');
			})
</script>
    
    
@endsection
