<?php
namespace Modules\Extra\Services;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AttributeService implements AttributeServiceInterface
{
    public function paginateWithFilters(array $filters): LengthAwarePaginator
    {
        // return Attribute::query()
            // ->when($filters['search'] ?? null, function ($query, $search) {
            //     $query->where('name', 'like', "%{$search}%");
            // })
            // ->orderBy('created_at', 'desc')
            // ->paginate(10);


        return Attribute::withCount('values')
            ->when($filters['search'], fn($query) =>
                $query->where('attribute', 'like', '%' . $filters['search'] . '%')
            )
            ->orderBy($filters['sortField'], $filters['sortDirection'])
            ->paginate($filters['perPage'] ?? 10);



    }

    public function create(array $data): Attribute
    {
        return Attribute::create($data);
    }

    public function update(Attribute $attribute, array $data): Attribute
    {
        $attribute->update($data);
        return $attribute;
    }

    public function deleteWithDetach(Attribute $attribute): void
    {
        $attribute->values()->detach();
        $attribute->delete();
    }

    public function attachValues(Attribute $attribute, array $valueIds): void
    {
        $attribute->values()->attach($valueIds);
    }

    public function detachValue(Attribute $attribute, int $valueId): void
    {
        $attribute->values()->detach($valueId);
    }
}