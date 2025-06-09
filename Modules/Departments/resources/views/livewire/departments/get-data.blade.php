<div>
    <ul class="list-group">
        @foreach ($departments as $department)
            @include('departments::livewire.departments.partials.tree-node', ['department' => $department])
        @endforeach
    </ul>
</div>
