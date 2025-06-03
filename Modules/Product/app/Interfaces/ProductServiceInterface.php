<?php
namespace Modules\Product\Interfaces;
use Modules\Product\Models\Product;

interface  ProductServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Product;

    public function update(Product $product, array $data): Product;

    public function delete(Product $product): void;





}
