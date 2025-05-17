<?php
namespace Modules\Extra\Interfaces;
use Modules\Extra\Models\Attribute;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface  AttributeServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Attribute;

    public function update(Attribute $attribute, array $data): Attribute;

    public function deleteWithDetach(Attribute $attribute): void;

    public function attachValues(Attribute $attribute, array $valueIds): void;

    public function detachValue(Attribute $attribute, int $valueId): void;

}
