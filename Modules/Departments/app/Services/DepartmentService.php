<?php

namespace Modules\Departments\Services;

use Modules\Departments\Models\Department;
use Modules\Departments\Interfaces\DepartmentServiceInterface;

class DepartmentService implements DepartmentServiceInterface
{
    public function list()
    {
        return Department::with('parent')->latest()->get();
    }

    public function create(array $data)
    {
        return Department::create($data);
    }

    public function update(Department $department, array $data)
    {
        return $department->update($data);
    }

    public function delete(Department $department): bool
    {
        return $department->delete();
    }

    // public function restore(Department $department): bool
    // {
    //     return $department->restore();
    // }

    // public function forceDelete(Department $department): bool
    // {
    //     return $department->forceDelete();
    // }
}

