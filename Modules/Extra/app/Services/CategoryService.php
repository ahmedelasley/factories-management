<?php
namespace Modules\Extra\Services;
use Modules\Extra\Interfaces\CategoryServiceInterface;
use Modules\Extra\Models\Category;


class CategoryService implements CategoryServiceInterface
{

    public function getAll(array $filters = [])
    {

        return Category::with(['creator', 'editor', 'parent', 'children'])
            ->withCount('children');

    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): Category
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }

    public function getById(int $id): ?Category
    {
        return Category::with(['creator', 'editor', 'attributes'])
            ->withCount('attributes')
            ->find($id);
    }


}
