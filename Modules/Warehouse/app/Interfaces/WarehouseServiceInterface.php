<?php
namespace Modules\Warehouse\Interfaces;
use Modules\Warehouse\Models\Warehouse;

interface  WarehouseServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Warehouse;

    public function update(Warehouse $warehouse, array $data): Warehouse;

    public function delete(Warehouse $warehouse): void;





}
