<?php
namespace Modules\Supplier\Interfaces;
use Modules\Supplier\Models\Supplier;

interface  SupplierServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Supplier;

    public function update(Supplier $supplier, array $data): Supplier;

    public function delete(Supplier $supplier): void;





}
