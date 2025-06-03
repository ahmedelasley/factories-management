<?php

namespace Modules\Product\Services;

use Modules\Product\Models\Product;

class ProductCodeGeneratorService
{
    /**
     * Generate a unique product code.
     */
    public function generate(): string
    {
        $prefix = 'PRO-';
        $latest = Product::latest('id')->first();

        $nextId = $latest ? $latest->id + 1 : 1;
        $code = $prefix . str_pad($nextId, 0, '0', STR_PAD_LEFT); // PRO-1

        // Ensure it's unique (optional redundancy)
        while (Product::where('code', $code)->exists()) {
            $nextId++;
            $code = $prefix . str_pad($nextId, 0, '0', STR_PAD_LEFT);
        }

        return $code;
    }
}
