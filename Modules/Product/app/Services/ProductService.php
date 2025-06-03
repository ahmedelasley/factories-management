<?php
namespace Modules\Product\Services;
use Modules\Product\Interfaces\ProductServiceInterface;
use Modules\Product\Models\Product;


class ProductService implements ProductServiceInterface
{

    public function getAll(array $filters = [])
    {
        return Product::with(['creator', 'editor']);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }


}
