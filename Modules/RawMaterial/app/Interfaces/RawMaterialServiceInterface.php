<?php
namespace Modules\RawMaterial\Interfaces;
use Modules\RawMaterial\Models\RawMaterial;

interface  RawMaterialServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): RawMaterial;

    public function update(RawMaterial $rawMaterial, array $data): RawMaterial;

    public function delete(RawMaterial $rawMaterial): void;





}
