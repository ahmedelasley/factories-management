<div>
    <input type="text" wire:model.debounce.500ms="search" placeholder="ابحث عن خاصية...">

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th wire:click="sortBy('attribute')">الخاصية</th>
                <th wire:click="sortBy('status')">الحالة</th>
                <th>عدد القيم</th>
                <th wire:click="sortBy('created_at')">تاريخ الإنشاء</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attributes as $attr)
                <tr>
                    <td>{{ $attr->attribute }}</td>
                    <td>{{ $attr->status }}</td>
                    <td>{{ $attr->values_count }}</td>
                    {{-- <td>{{ $attr->created_at->format('Y-m-d') }}</td> --}}
                    <td>
                        {{-- <a href="{{ route('attributes.edit', $attr->id) }}">✏️</a> |
                        <a href="{{ route('attributes.attach-values', $attr->id) }}">🔗</a> |
                        <button wire:click="confirmDelete({{ $attr->id }})" class="btn btn-sm btn-danger">🗑️</button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attributes->links() }}

    {{-- Confirmation Modal --}}
    {{-- @if($confirmingDelete)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content p-4">
                    <h5>هل أنت متأكد أنك تريد حذف هذه الخاصية؟</h5>
                    <div class="mt-3 d-flex justify-content-end gap-2">
                        <button wire:click="delete" class="btn btn-danger">نعم، حذف</button>
                        <button wire:click="$set('confirmingDelete', false)" class="btn btn-secondary">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
</div>
