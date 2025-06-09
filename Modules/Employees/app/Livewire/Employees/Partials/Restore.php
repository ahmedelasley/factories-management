<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Livewire\Component;
use Modules\Employees\Models\Employee;
use Modules\Employees\Livewire\Employees\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Employees\Interfaces\EmployeeServiceInterface;

class Restore extends Component
{

    /** @var Employee|null */
    public $model = null;

    public string $name;
    protected EmployeeServiceInterface $service;

    public function boot(EmployeeServiceInterface $service): void
    {
        $this->service = $service;
    }

    protected $listeners = ['restore_employee'];
    public function restore_employee($id)
    {
        $this->model = Employee::withTrashed()->find($id);

        if (!$this->model) {
                // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Employee not found.'))
            ->error()
            ->show();
            return;
        }

            // Set the properties
        $this->name = $this->model->name;

            // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

            // Open modal
        $this->dispatch('restore-employee-modal');
    }


        /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit()
    {

        $this->service->restore($this->model);

        $this->resetForm();
            // Close the modal on the frontend
        $this->dispatch('restore-employee-modal');

            // Refresh the employee table
        $this->dispatch('refreshData')->to(GetData::class);

            // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('Restored successfully.'))
            ->success()
            ->show();
    }

            /**
     * Reset all form values and errors.
     */
    public function resetForm(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }


       /**
     * Cancel and reset.
     */
    public function close(): void
    {
        $this->resetForm();
        $this->dispatch('refreshData');
    }

    /**
     * عرض واجهة إنشاء الخاصية.
     */
    public function render()
    {
        return view('employees::livewire.employees.partials.restore');

    }

}
