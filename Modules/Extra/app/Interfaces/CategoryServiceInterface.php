<?php
namespace Modules\Extra\Interfaces;
use Modules\Extra\Models\Category;

interface  CategoryServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Category;

    public function update(Category $category, array $data): Category;

    public function delete(Category $category): void;
    public function getById(int $id): ?Category;
}
