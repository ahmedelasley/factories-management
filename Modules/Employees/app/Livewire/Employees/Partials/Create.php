<?php

namespace Modules\Employees\Livewire\Employees\Partials;

use Livewire\Component;
use Modules\Employees\Livewire\Employees\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\Enum;
use Modules\Employees\Enums\EmployeeStatus;
// use Modules\Employees\Models\Department;
// use Modules\Employees\Models\Position;
use Modules\Employees\Interfaces\EmployeeServiceInterface;
use Modules\Employees\Http\Requests\StoreEmployeeRequest;

class Create extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $gender = 'male';
    public string $national_id = '';
    // public $department_id;
    // public $position_id;
    public string $hire_date = '';
    public string $status = EmployeeStatus::Active->value;
    public $photo;

    protected EmployeeServiceInterface $service;

    public function boot(EmployeeServiceInterface $service): void
    {
        $this->service = $service;
    }

        /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreEmployeeRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function submit(): void
    {
        $validated = $this->validate();

        if ($this->photo) {
            $validated['photo'] = $this->photo->store('employees', 'public');
        }

        $this->service->create($validated);

        $this->resetForm();
        // Close the modal on the frontend
        $this->dispatch('create-employee-modal');

        // Refresh the Product table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('Product added successfully.'))
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
        return view('employees::livewire.employees.partials.create', [
            // 'departments' => Department::pluck('name', 'id'),
            // 'positions' => Position::pluck('name', 'id'),
            'statuses' => EmployeeStatus::cases(),
        ]);
    }
}
