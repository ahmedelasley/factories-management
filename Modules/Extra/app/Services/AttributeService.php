<?php
namespace Modules\Extra\Services;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class AttributeService implements AttributeServiceInterface
{

    public function getAll(array $filters = [])
    {

        return Attribute::with(['creator', 'editor', 'values'])
            ->withCount('values');

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

    public function delete(Attribute $attribute): void
    {
        $attribute->delete();
        // return $attribute;
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
