<?php

namespace Modules\Departments\Interfaces;

use Modules\Departments\Models\Department;

interface DepartmentServiceInterface
{
    public function list();
    public function create(array $data);
    public function update(Department $department, array $data);
    public function delete(Department $department): bool;
    // public function restore(Department $department): bool;
    // public function forceDelete(Department $department): bool;
}

