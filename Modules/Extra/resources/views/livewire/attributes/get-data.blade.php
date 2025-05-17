<div class="col-xl-12">
    <div class="card">
        {{-- <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <div>

                </div>
                <div>

                </div>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
        </div> --}}

        <div class="card-title d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-start m-3">
                <div class="btn-group" role="group">
                    <x-text-input id="search" wire:model.live="search" type="text" class="form-control w-100 h"  style="height:38px" placeholder="Search..."/>
                    <button type="button" class="btn btn-light  btn-icon" data-placement="top" data-toggle="tooltip" title="{{ __('Clear Search') }}" wire:click="resetSearch">
                        <i class='bx bx-x'></i>
                    </button>
                </div>

                <div style="margin-inline-start: 10px">
                    <button type="button" class="btn btn-secondary btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Filter By') }}" >
                        <i class='bx bx-filter-alt'></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ $searchField == 'id' ? 'active' : ''}}" href="javascript:void(0);" wire:click="searchFilter('id')">Id</a></li>
                        <li><a class="dropdown-item {{ $searchField == 'attribute' ? 'active' : ''}}" href="javascript:void(0);" wire:click="searchFilter('attribute')">Attribute</a></li>
                        {{-- <li><a class="dropdown-item" href="javascript:void(0);" wire:click="searchField('code')">Code</a></li> --}}
                    </ul>
                </div>

                <div style="margin-inline-start: 10px">
                    <button type="button" class="btn btn-success btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Export Data') }}" >
                        <i class='fa fa-download'></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportPDF">Export PDF</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportExcel">Export Excel</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportPDF">Export PDF to Mail</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportExcel">Export Excel to Mail</a></li>
                    </ul>
                </div>

                <div style="margin-inline-start: 10px">
                    <button type="button" class="btn btn-danger btn-icon" data-placement="top" data-toggle="tooltip" title="{{ __('Import Data') }}">
                        <i class='fa fa-upload'></i>
                    </button>
                </div>
            </div>
            <div class=" m-3" style="margin-inline-start: 10px">
                <button type="button" class="btn btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Paginate') }}">
                    {{ $paginate }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" wire:click="selectPaginate(10)">10</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" wire:click="selectPaginate(25)">25</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" wire:click="selectPaginate(50)">50</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" wire:click="selectPaginate(100)">100</a></li>
                </ul>
            </div>

            {{-- <select wire:model.live="paginate" class="form-control w-10 m-3" style="width:75px" id="paginate">
                <option disabled value="">Select a Paginate...</option>
                <option value="{{ getSetting('pagination') }}">{{ getSetting('pagination') }} *</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
            </select> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive hoverable-table">
                <table id="" class="table table-striped table-bordered table-hover text-md-wrap text-center" >
                    {{-- <thead> --}}
                        <tr class="bg-dark fs-14 text-bold text-white">
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('id')"># <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('attribute')">{{ __('Attribute')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')">{{ __('Values')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')">{{ __('No. Values')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('status')">{{ __('Status')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')">{{ __('Creator By')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')">{{ __('Created At')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')">{{ __('editor By')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')">{{ __('Updated At')}} <i class="fas fa-sort"></i></a></th>
                            <th><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')">{{ __('Action')}} <i class="fas fa-sort"></i></a></th>
                        </tr>
                    {{-- </thead> --}}
                    <tbody>
                        @foreach($data as $value)
                            <tr class="fs-4 fw-bold ">
                                <td>{{ $data->firstItem()+$loop->index }}</td>
                                <td>{{ $value->attribute }}</td>
                                <td>
                                    @forelse ($value->values as $item)
                                        <span class="badge badge-primary">{{ $item->value }}</span>
                                    @empty
                                        <span class="badge badge-danger">{{ __('No Values')}}</span>
                                    @endforelse
                                </td>
                                <td>{{ $value->values_count }}</td>
                                <td>{{ $value->status->label() }}</td>
                                <td>
                                    @if ($value->creator)
                                        <span class="badge badge-{{ $value->creator->name == __('Unknown') ? 'danger' : 'primary' }}">{{ $value->creator?->name }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Unknown')}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($value->created_at)
                                        <span class="badge badge-primary">{{ $value->created_at }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Unknown')}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($value->editor)
                                        <span class="badge badge-{{ $value->editor->name == __('Unknown') ? 'danger' : 'success' }}">{{ $value->editor?->name }}</span>
                                    @elseif ($value->updated_at == null)
                                        <span class="badge badge-success">{{ __('Not Updated Yet')}}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Unknown')}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($value->updated_at)
                                        <span class="badge badge-primary">{{ $value->updated_at }}</span>
                                    @else
                                        <span class="badge badge-success">{{ __('Not Updated Yet')}}</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- // Edit --}}
                                    <button wire:click="edit({{ $value->id }})" class="btn btn-success btn-sm">{{ __('Edit', ['type' => __('Attribute')])}}</button>
                                    {{-- // Delete --}}
                                    <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">{{ __('Delete', ['type' => __('Attribute')])}}</button>
                                    {{-- // Attach Values --}}
                                    <button wire:click="attachValues({{ $value->id }})" class="btn btn-secondary btn-sm">{{ __('Attach Values')}}</button>
                                    {{-- // Detach Values --}}
                                    <button wire:click="detachValues({{ $value->id }})" class="btn btn-secondary btn-sm">{{ __('Detach Values')}}</button>
                                    {{-- // Toggle Status --}}
                                    <button wire:click="toggleStatus({{ $value->id }})" class="btn btn-{{ $value->status === App\Enums\Status::cases()[0] ? 'warning' : 'info' }} btn-sm">
                                        {{ $value->status->btnLabel() }}
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr class="bg-dark fs-14 text-bold text-white">
                            <th>#</th>
                            <th>{{ __('Attribute')}}</th>
                            <th>{{ __('Status')}}</th>
                            <th>{{ __('No. Values')}}</th>
                            <th>{{ __('Creator By')}}</th>
                            <th>{{ __('Created At')}}</th>
                            <th>{{ __('editor By')}}</th>
                            <th>{{ __('Updated At')}}</th>
                            <th>{{ __('Action')}}</th>
                            <th>{{ __('Values')}}</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex flex-row justify-content-end">
                <div class="pagination pagination-primary text-center">
                    {{ $data->withQueryString()->onEachSide(0)->links() }} {{-- Laravel pagination links --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
{{-- <script>
    Livewire.on('reinit-datatable', () => {
        // انتظر قليلاً حتى يعيد Livewire رسم الجدول
        setTimeout(() => {
            if ($.fn.DataTable.isDataTable('#custom-table')) {
                $('#custom-table').DataTable().destroy();
            }

            var table = $('#custom-table').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder:"{{ __('Search') }}.....",
                    url: "{{ asset('lang/datatable/' . app()->getLocale() . '.json') }}"
                }
            });

            // دعم اختيار الصف من جديد
            $('#custom-table tbody').off('click').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        }, 300); // تأخير بسيط لإتاحة الوقت لـ Livewire
    });
</script> --}}
@endpush
