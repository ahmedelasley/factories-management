<?php
namespace Modules\Extra\Interfaces;
use Modules\Extra\Models\Value;

interface  ValueServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Value;

    public function update(Value $value, array $data): Value;

    public function delete(Value $value): void;

    // public function deleteWithDetach(Value $value): void;

    // public function attachValues(Value $value, array $valueIds): void;

    // public function detachValue(Value $value, int $valueId): void;

    // public function detachValues(Value $value, array $valueIds): void;



}
