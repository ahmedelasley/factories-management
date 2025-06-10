<li class="list-group-item" >
    <a href="javascript:void(0);">
        <div class="d-flex justify-content-between align-items-center">
            <strong>{{ $department->name }}</strong>

            <div class="btn-group">
                <button wire:click="$emit('editDepartment', {{ $department->id }})" class="btn btn-md btn-warning ms-2">✏️</button>
                <button wire:click="$emit('deleteDepartment', {{ $department->id }})" class="btn btn-md btn-danger">🗑️</button>
            </div>

        </div>

        @if ($department->children->isNotEmpty())
            <ul class="list-group m-2 ms-3" >
                @foreach ($department->children as $child)
                    @include('departments::livewire.departments.partials.tree-node', ['department' => $child])
                @endforeach
            </ul>
        @endif
    </a>
</li>
