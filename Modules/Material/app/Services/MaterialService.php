<?php
namespace Modules\Material\Services;
use Modules\Material\Interfaces\MaterialServiceInterface;
use Modules\Material\Models\Material;


class MaterialService implements MaterialServiceInterface
{

    public function getAll(array $filters = [])
    {
        return Material::with(['creator', 'editor']);
    }

    public function create(array $data): Material
    {
        return Material::create($data);
    }

    public function update(Material $material, array $data): Material
    {
        $material->update($data);
        return $material;
    }

    public function delete(Material $material): void
    {
        $material->delete();
    }


}
