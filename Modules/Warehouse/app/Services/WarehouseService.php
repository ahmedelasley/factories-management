<?php
namespace Modules\Warehouse\Services;
use Modules\Warehouse\Interfaces\WarehouseServiceInterface;
use Modules\Warehouse\Models\Warehouse;


class WarehouseService implements WarehouseServiceInterface
{

    public function getAll(array $filters = [])
    {
        return Warehouse::with(['creator', 'editor']);
    }

    public function create(array $data): Warehouse
    {
        return Warehouse::create($data);
    }

    public function update(Warehouse $warehouse, array $data): Warehouse
    {
        $warehouse->update($data);
        return $warehouse;
    }

    public function delete(Warehouse $warehouse): void
    {
        $warehouse->delete();
    }


}
