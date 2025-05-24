<?php
namespace Modules\Supplier\Services;
use Modules\Supplier\Interfaces\SupplierServiceInterface;
use Modules\Supplier\Models\Supplier;


class SupplierService implements SupplierServiceInterface
{

    public function getAll(array $filters = [])
    {
        return Supplier::with(['creator', 'editor', 'companies'])
            ->withCount('companies');
    }

    public function create(array $data): Supplier
    {
        return Supplier::create($data);
    }

    public function update(Supplier $supplier, array $data): Supplier
    {
        $supplier->update($data);
        return $supplier;
    }

    public function delete(Supplier $supplier): void
    {
        $supplier->delete();
    }


}
