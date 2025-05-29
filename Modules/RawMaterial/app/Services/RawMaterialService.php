<?php
namespace Modules\RawMaterial\Services;
use Modules\RawMaterial\Interfaces\RawMaterialServiceInterface;
use Modules\RawMaterial\Models\RawMaterial;


class RawMaterialService implements RawMaterialServiceInterface
{

    public function getAll(array $filters = [])
    {
        return RawMaterial::with(['creator', 'editor']);
    }

    public function create(array $data): RawMaterial
    {
        return RawMaterial::create($data);
    }

    public function update(RawMaterial $rawMaterial, array $data): RawMaterial
    {
        $rawMaterial->update($data);
        return $rawMaterial;
    }

    public function delete(RawMaterial $rawMaterial): void
    {
        $rawMaterial->delete();
    }


}
