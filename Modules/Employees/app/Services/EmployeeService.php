<?php

namespace Modules\Employees\Services;

use Modules\Employees\Models\Employee;
use Modules\Employees\Interfaces\EmployeeServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService implements EmployeeServiceInterface
{
    // public function list(): Collection
    // {
    //     return Employee::latest()->get();
    // }

    public function getAll(array $filters = [])
    {
        return Employee::with(['creator', 'editor']);
    }

    public function find(int $id): ?Employee
    {
        return Employee::find($id);
    }

    public function create(array $data): Employee
    {
        return Employee::create($data);
    }

    public function update(Employee $employee, array $data): bool
    {
        return $employee->update($data);
    }

    public function delete(Employee $employee): bool
    {
        return $employee->delete(); // 🔄 soft delete
    }

    public function forceDelete(Employee $employee): bool
    {
        return $employee->forceDelete(); // حذف نهائي
    }

    public function restore(Employee $employee): bool
    {
        return $employee->restore(); // استرجاع
    }
}
