<?php

namespace Modules\Employees\Observers;

use Modules\Employees\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function creating(Employee $model): void
    {
        if (Auth::check()) {
            $model->creator()->associate(Auth::user());
        }
    }

    public function created(Employee $employee): void {}

    public function updating(Employee $model): void
    {
        if (Auth::check()) {
            $model->editor()->associate(Auth::user());
        }
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void {}

    public function deleting(Employee $model): void
    {
        if (Auth::check()) {
            $model->deletor()->associate(Auth::user());
            $model->save(); // ضروري لتسجيل الحذف
        }
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void {}

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void {}

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void {}

}
