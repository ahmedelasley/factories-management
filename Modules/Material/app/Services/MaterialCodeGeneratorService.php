<?php

namespace Modules\Material\Services;

use Modules\Material\Models\Material;

class MaterialCodeGeneratorService
{
    /**
     * Generate a unique material code.
     */
    public function generate(): string
    {
        $prefix = 'MAT-';
        $latest = Material::latest('id')->first();

        $nextId = $latest ? $latest->id + 1 : 1;
        $code = $prefix . str_pad($nextId, 0, '0', STR_PAD_LEFT); // MAT-1

        // Ensure it's unique (optional redundancy)
        while (Material::where('code', $code)->exists()) {
            $nextId++;
            $code = $prefix . str_pad($nextId, 0, '0', STR_PAD_LEFT);
        }

        return $code;
    }
}
