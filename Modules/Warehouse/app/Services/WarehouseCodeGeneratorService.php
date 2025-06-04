<?php

namespace Modules\Warehouse\Services;

use Modules\Warehouse\Models\Warehouse;

class WarehouseCodeGeneratorService
{
    /**
     * Generate a unique product code.
     */
    public function generate(): string
    {
        $prefix = 'War-';
        $latest = Warehouse::latest('id')->first();

        $nextId = $latest ? $latest->id + 1 : 1;
        $code = $prefix . str_pad($nextId, 0, '0', STR_PAD_LEFT); // PRO-1

        // Ensure it's unique (optional redundancy)
        while (Warehouse::where('code', $code)->exists()) {
            $nextId++;
            $code = $prefix . str_pad($nextId, 0, '0', STR_PAD_LEFT);
        }

        return $code;
    }
}
