<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Livewire\Component;
use Modules\Employees\Models\Employee;
use Modules\Employees\Livewire\Employees\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Employees\Interfaces\EmployeeServiceInterface;

class Delete extends Component
{

    /** @var Employee|null */
    public $model = null;

    public string $name;
    protected EmployeeServiceInterface $service;

    public function boot(EmployeeServiceInterface $service): void
    {
        $this->service = $service;
    }

    protected $listeners = ['delete_employee'];
    public function delete_employee($id)
    {
        $this->model = Employee::find($id);

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
        $this->dispatch('delete-employee-modal');
    }


        /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit()
    {

        $this->service->delete($this->model);

        $this->resetForm();
            // Close the modal on the frontend
        $this->dispatch('delete-employee-modal');

            // Refresh the employee table
        $this->dispatch('refreshData')->to(GetData::class);

            // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('Deleted successfully.'))
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
        return view('employees::livewire.employees.partials.delete');

    }

}
