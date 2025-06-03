<?php
namespace Modules\Material\Interfaces;
use Modules\Material\Models\Material;

interface  MaterialServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Material;

    public function update(Material $material, array $data): Material;

    public function delete(Material $material): void;





}
