<?php

namespace Modules\Employees\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\Employees\Models\Employee;

interface EmployeeServiceInterface
{
    // public function list(): Collection;
    public function getAll(array $filters = []);

    public function find(int $id): ?Employee;
    public function create(array $data): Employee;
    public function update(Employee $employee, array $data): bool;
    public function delete(Employee $employee): bool;
    public function forceDelete(Employee $employee): bool;
    public function restore(Employee $employee): bool;
}
