<?php
namespace Modules\Extra\Services;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class AttributeService implements AttributeServiceInterface
{
    protected string $cacheKey = 'attributes:all';


    public function paginateWithFilters(array $filters): LengthAwarePaginator
    {
        // return Attribute::query()
            // ->when($filters['search'] ?? null, function ($query, $search) {
            //     $query->where('name', 'like', "%{$search}%");
            // })
            // ->orderBy('created_at', 'desc')
            // ->paginate(10);

        return Attribute::with(['creator', 'editor', 'values'])->withCount('values')
            ->filter($filters) // use Scope filter
            ->paginate($filters['perPage'] ?? 10);


        // return Attribute::withCount('values')
        //     ->when($filters['search'], fn($query) =>
        //         $query->where('attribute', 'like', '%' . $filters['search'] . '%')
        //     )
        //     ->orderBy($filters['sortField'], $filters['sortDirection'])
        //     ->paginate($filters['perPage'] ?? 10);



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

    public function refreshCache(array $filters): void
    {
        Cache::forget($this->cacheKey);

        Cache::remember($this->cacheKey, now()->addMinutes(5), function () use ($filters) {
            return $this->paginateWithFilters($filters);
        });
    }

}
