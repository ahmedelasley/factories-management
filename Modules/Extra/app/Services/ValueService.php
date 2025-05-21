<?php
namespace Modules\Extra\Services;
use Modules\Extra\Interfaces\ValueServiceInterface;
use Modules\Extra\Models\Value;


class ValueService implements ValueServiceInterface
{

    public function getAll(array $filters = [])
    {

        return Value::with(['creator', 'editor', 'attributes'])
            ->withCount('attributes');

    }

    public function create(array $data): Value
    {
        return Value::create($data);
    }

    public function update(Value $value, array $data): Value
    {
        $value->update($data);
        return $value;
    }

    public function delete(Value $value): void
    {
        $value->delete();
    }

}
