<div class="col-xl-12">
    <div class="card">
        {{-- <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Hoverable Rows Table</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <p class="tx-12 tx-gray-500 mb-2">Example of Valex Hoverable Rows Table.. <a href="">Learn more</a></p>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive hoverable-table">
                <table id="example-delete" class="table text-md-nowrap table-bordered table-hover" >
                    <thead>
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>{{ __('Attribute')}}</th>
                            <th>{{ __('Status')}}</th>
                            <th>{{ __('No. Values')}}</th>
                            <th>{{ __('Creator By')}}</th>
                            <th>{{ __('Created At')}}</th>
                            <th>{{ __('Updater By')}}</th>
                            <th>{{ __('Updated At')}}</th>
                            <th>{{ __('Action')}}</th>
                            <th>{{ __('Values')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attributes as $attr)
                        <tr>
                            {{-- <td>{{ $attr->id }}</td> --}}
                            <td>{{ $attr->attribute }}</td>
                            <td>{{ $attr->status->label() }}</td>
                            <td>{{ $attr->values_count }}</td>
                            <td>
                                @if ($attr->creator)
                                    <span class="badge badge-{{ $attr->creator->name == __('Unknown') ? 'danger' : 'primary' }}">{{ $attr->creator?->name }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Unknown')}}</span>
                                @endif
                            </td>
                            <td>
                                @if ($attr->created_at)
                                    <span class="badge badge-primary">{{ $attr->created_at }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Unknown')}}</span>
                                @endif
                            </td>
                            <td>
                                @if ($attr->updater)   
                                    <span class="badge badge-{{ $attr->updater->name == __('Unknown') ? 'danger' : 'success' }}">{{ $attr->updater?->name }}</span>
                                @elseif ($attr->updated_at == null)
                                    <span class="badge badge-success">{{ __('Not Updated Yet')}}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Unknown')}}</span>
                                @endif
                            </td>
                            <td>
                                @if ($attr->updated_at)
                                    <span class="badge badge-primary">{{ $attr->updated_at }}</span>
                                @else
                                    <span class="badge badge-success">{{ __('Not Updated Yet')}}</span>
                                @endif
                            </td>
                            <td>
                                {{-- // Edit --}}

                                <button wire:click="edit({{ $attr->id }})" class="btn btn-success btn-sm">{{ __('Edit')}}</button>
                                {{-- // Delete --}}
                                <button wire:click="delete({{ $attr->id }})" class="btn btn-danger btn-sm">{{ __('Delete')}}</button>
                                {{-- // Attach Values --}}
                                <button wire:click="attachValues({{ $attr->id }})" class="btn btn-secondary btn-sm">{{ __('Attach Values')}}</button>
                                {{-- // Detach Values --}}
                                <button wire:click="detachValues({{ $attr->id }})" class="btn btn-secondary btn-sm">{{ __('Detach Values')}}</button>
                                {{-- // Toggle Status --}}
                                <button wire:click="toggleStatus({{ $attr->id }})" class="btn btn-{{ $attr->status === App\Enums\Status::cases()[0] ? 'warning' : 'info' }} btn-sm">
                                    {{ $attr->status->btnLabel() }}
                                </button>
                                

                            </td>
                            <td>


                                @forelse ($attr->values as $item)
                                    <span class="badge badge-primary">{{ $item->value }}</span>
                                @empty
                                    <span class="badge badge-danger">{{ __('No Values')}}</span>
                                @endforelse
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>{{ __('Attribute')}}</th>
                            <th>{{ __('Status')}}</th>
                            <th>{{ __('No. Values')}}</th>
                            <th>{{ __('Creator By')}}</th>
                            <th>{{ __('Created At')}}</th>
                            <th>{{ __('Updater By')}}</th>
                            <th>{{ __('Updated At')}}</th>
                            <th>{{ __('Action')}}</th>
                            <th>{{ __('Values')}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>