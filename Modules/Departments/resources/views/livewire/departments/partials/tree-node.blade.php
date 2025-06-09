<li class="list-group-item" data-id="{{ $department->id }}">
    <div class="d-flex justify-content-between align-items-center">
        <strong>{{ $department->name }}</strong>

        <div class="btn-group">
            <button wire:click="$emit('addDepartment', {{ $department->id }})" class="btn btn-sm btn-primary">➕</button>
            <button wire:click="$emit('editDepartment', {{ $department->id }})" class="btn btn-sm btn-warning">✏️</button>

            @if ($department->trashed())
                <button wire:click="$emit('restoreDepartment', {{ $department->id }})" class="btn btn-sm btn-success">♻️</button>
            @else
                <button wire:click="$emit('deleteDepartment', {{ $department->id }})" class="btn btn-sm btn-danger">🗑️</button>
            @endif
        </div>

    </div>

    @if ($department->children->isNotEmpty())
        <ul class="list-group mt-2 ms-3 sortable-tree" data-id="{{ $department->id }}">
            @foreach ($department->children as $child)
                @include('departments::livewire.departments.partials.tree-node', ['department' => $child])
            @endforeach
        </ul>
    @endif
</li>
