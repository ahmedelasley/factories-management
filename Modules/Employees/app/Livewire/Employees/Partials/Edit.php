<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\Enum;
use Modules\Employees\Models\Employee;
use Modules\Employees\Models\Department;
use Modules\Employees\Models\Position;
use Modules\Employees\Enums\EmployeeStatus;
use Modules\Employees\Interfaces\EmployeeServiceInterface;
use Modules\Employees\Livewire\Employees\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Employees\Http\Requests\UpdateEmployeeRequest;

class Edit extends Component
{
    use WithFileUploads;

    /** @var Employee|null */
    public $model = null;

    public string $name;
    public string $email;
    public string $phone = '';
    public string $gender = 'male';
    public string $national_id = '';
    // public $department_id;
    // public $position_id;
    public string $hire_date;
    public string $status;
    public $photo;
    public ?string $currentPhoto = null;

    protected EmployeeServiceInterface $service;

    public function boot(EmployeeServiceInterface $service): void
    {
        $this->service = $service;
    }

    protected $listeners = ['edit_employee'];

    public function edit_employee($id)
    {
        $this->model = Employee::findOrFail($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('employee not found.'))
            ->error()
            ->show();

            return;
        }

        // Set the properties
        $this->name = $this->model->name;
        $this->email = $this->model->email;
        $this->phone = $this->model->phone;
        $this->gender = $this->model->gender;
        $this->national_id = $this->model->national_id;

        $this->hire_date = $this->model->hire_date->format('Y-m-d');
        $this->status = $this->model->status->value;
        $this->currentPhoto = $this->model->photo;

        // Reset validation and errors
        // $this->resetForm();
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('edit-employee-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdatevalueRequest())->rules();
        return (new UpdateEmployeeRequest($this->model?->id))->rules();

    }

    /**
     * تحقق فوري عند تحديث أي حقل.
     */
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit(): void
    {
        $validated = $this->validate();

        if ($this->photo) {
            $validated['photo'] = $this->photo->store('employees', 'public');
        } else {
            $validated['photo'] = $this->currentPhoto;
        }

        $this->service->update($this->model, $validated);

        $this->resetForm();
        // Close the modal on the frontend
        $this->dispatch('edit-employee-modal');

        // Refresh the employee table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('employee added successfully.'))
            ->success()
            ->show();
    }

        /**
     * Reset all form values and errors.
     */
    public function resetForm(): void
    {
        $this->reset();
        $this->status = EmployeeStatus::Active->value;
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


    public function render()
    {
        return view('employees::livewire.employees.partials.edit', [
            // 'departments' => Department::pluck('name', 'id'),
            // 'positions' => Position::pluck('name', 'id'),
            'statuses' => EmployeeStatus::cases(),
        ]);
    }
}
