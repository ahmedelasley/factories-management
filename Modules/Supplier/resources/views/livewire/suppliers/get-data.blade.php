<div class="col-xl-12">
    <div class="card">
        <div class="card-title d-flex justify-content-between flex-wrap">
            <div class="d-flex justify-content-start m-3">
                <div class="btn-group" role="group">
                    <x-text-input id="search" wire:model.live="search" type="text" class="form-control w-100 h"  style="height:38px" placeholder="{{ __('Search') }}..." autofocus/>
                    <button type="button" class="btn btn-light  btn-icon" data-placement="top" data-toggle="tooltip" title="{{ __('Clear Search') }}" wire:click="resetSearch">
                        <i class='bx bx-x'></i>
                    </button>
                </div>

                <div style="margin-inline-start: 10px">
                    <button type="button" class="btn btn-secondary btn-icon dropdown" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Filter By') }}" >
                        <i class='bx bx-filter-alt'></i>
                    </button>
                    <ul class="dropdown-menu table-bordered table-striped table-hover text-md-wrap">
                        <li><a class="dropdown-item {{ $searchField == 'id' ? 'active' : ''}}" href="javascript:void(0);" wire:click="searchFilter('id')"><b>{{ __('#')}}</b></a></li>
                        <li><a class="dropdown-item {{ $searchField == 'name' ? 'active' : ''}}" href="javascript:void(0);" wire:click="searchFilter('name')"><b>{{ __('Name')}}</b></a></li>
                        <li><a class="dropdown-item {{ $searchField == 'status' ? 'active' : ''}}" href="javascript:void(0);" wire:click="searchFilter('status')"><b>{{ __('Status')}}</b></a></li>
                        {{-- <li><a class="dropdown-item" href="javascript:void(0);" wire:click="searchField('code')">Code</a></li> --}}
                    </ul>
                </div>

                <div style="margin-inline-start: 10px">
                    <button type="button" class="btn btn-success btn-icon dropdown" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Export Data') }}" >
                        <i class='fa fa-download'></i>
                    </button>
                    <ul class="dropdown-menu table-bordered table-striped table-hover text-md-wrap">
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportPDF"><b>{{ __('Export PDF')}}</b></a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportExcel"><b>{{ __('Export Excel')}}</b></a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportCSV"><b>{{ __('Export CSV')}}</b></a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportPDF"><b>{{ __('Export PDF to Mail')}}</b></a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportExcel"><b>{{ __('Export Excel to Mail')}}</b></a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" wire:click="exportCSV"><b>{{ __('Export CSV to Mail')}}</b></a></li>
                    </ul>
                </div>

                <div style="margin-inline-start: 10px">
                    <button type="button" class="btn btn-danger btn-icon" data-placement="top" data-toggle="tooltip" title="{{ __('Import Data') }}">
                        <i class='fa fa-upload'></i>
                    </button>
                </div>
            </div>
            <div class=" m-3" style="margin-inline-start: 10px">
                <button type="button" class="btn btn-outline-light btn-icon dropdown" data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Paginate') }}">
                    <b>{{ $paginate }}</b>
                </button>
                <ul class="dropdown-menu table-bordered table-striped table-hover text-bold text-md-wrap">
                    <li><a class="dropdown-item {{ $paginate == 10 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(10)">10</a></li>
                    <li><a class="dropdown-item {{ $paginate == 25 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(25)">25</a></li>
                    <li><a class="dropdown-item {{ $paginate == 50 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(50)">50</a></li>
                    <li><a class="dropdown-item {{ $paginate == 75 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(75)">75</a></li>
                    <li><a class="dropdown-item {{ $paginate == 100 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(100)">100</a></li>
                    <li><a class="dropdown-item {{ $paginate == 200 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(200)">200</a></li>
                    <li><a class="dropdown-item {{ $paginate == 500 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(500)">500</a></li>
                    <li><a class="dropdown-item {{ $paginate == 1000 ? 'active' : '' }}" href="javascript:void(0);" wire:click="selectPaginate(1000)">1000</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive hoverable-table">
                <table id="" class="table table-striped table-bordered table-hover text-md-wrap text-center" >
                    {{-- <thead> --}}
                        <tr class="bg-dark fs-14 text-bold text-white  text-center">
                            <th class="w-5 "><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('id')" wire:key="#"># <i class="fas fa-sort"></i></a></th>
                            <th class="w-20"><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('name')" wire:key="value">{{ __('Name')}} <i class="fas fa-sort"></i></a></th>
                            {{-- <th class="w-30"><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')" wire:key="attribute">{{ __('Main Category')}} <i class="fas fa-sort"></i></a></th> --}}
                            {{-- <th class="w-30"><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')" wire:key="attribute">{{ __('No. Categories')}} <i class="fas fa-sort"></i></a></th> --}}
                            <th class="w-10"><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('status')" wire:key="Status">{{ __('Status')}} <i class="fas fa-sort"></i></a></th>
                            <th class="w-10"><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')" wire:key="CreatorBy">{{ __('Creator By')}} <i class="fas fa-sort"></i></a></th>
                            <th class="w-10"><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')" wire:key="CreatedAt">{{ __('Created At')}} <i class="fas fa-sort"></i></a></th>
                            <th class="w-5 "><a class="d-flex justify-content-between link-no-color" type="button" href="javascript:void(0);" wire:click="sortBy('')" wire:key="Action">{{ __('Action')}} <i class="fas fa-sort"></i></a></th>
                        </tr>
                    {{-- </thead> --}}
                    <tbody>
                        @foreach($data as $value)
                            <tr class="fs-18 fw-bold">
                                <th><b>{{ $data->firstItem()+$loop->index }}</b></th>
                                <th><b>{{ $value->name }}</b></th>
                                {{-- <th><b><span class="badge badge-primary">{{ $value->parent?->name }}</span></b></th> --}}
                                {{-- <th><b>{{ $value->children_count}}</b></th> --}}
                                {{-- <th><b>{{ $value->value }}</b></th> --}}
                                {{-- <td>
                                    @forelse ($value->attributes as $item)
                                        <span class="badge badge-primary">{{ $item->attribute }}</span>
                                    @empty
                                        <span class="badge badge-danger">{{ __('No Attributes')}}</span>
                                    @endforelse
                                </td> --}}

                                {{-- <td><b>{{ $value->values_count }}</b></td> --}}
                                <td>
                                    <h6 class="{{ $value->status?->textColor() }}"> <div class="dot-label {{ $value->status?->bgColor() }} ml-1" ></div><b>{{ $value->status?->label() }}</b></h6>
                                </td>
                                <td><b>{{ $value->creator?->name }}</b>

                                </td>
                                <td>{{ $value?->created_at }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-dark btn-icon dropdown " data-toggle="dropdown" aria-expanded="false" data-placement="top" data-toggle="tooltip" title="{{ __('Action') }}">
                                            <i class='bx bx-dots-vertical'></i>
                                        </button>
                                        <ul class="dropdown-menu table-bordered table-striped table-hover text-md-wrap fs-18">
                                            <li><a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="$dispatch('show_supplier', { id: {{ $value->id }} })"> <b><i class="bx bx-info-circle"></i> {{ __('Details') }}</b></a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="$dispatch('edit_supplier', { id: {{ $value->id }} })"> <b><i class="bx bx-edit"></i> {{ __('Edit', ['type' => __('value')]) }}</b></a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="$dispatch('toggle_status_supplier', { id: {{ $value->id }} })"> <b><i class="{{ $value->status->swapIcon() }}"></i> {{ $value->status->swapBtnLabel() }}</b></a></li>
                                            <div class="dropdown-divider"></div>
                                            <li><a class="dropdown-item" href="javascript:void(0);"  wire:click.prevent="$dispatch('delete_supplier', { id: {{ $value->id }} })"> <b class="text-danger"><i class="bx bx-trash"></i> {{ __('Delete', ['type' => __('Supplier')]) }}</b></a></li>
                                        </ul>
                                    </div>
                                </td>
                                </b>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr class="bg-dark fs-14 text-bold text-white">
                            <th>#</th>
                            <th>{{ __('value')}}</th>
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

