<?php

namespace Modules\Warehouse\Livewire\Warehouses\Partials;

use Livewire\Component;
use Modules\Warehouse\Livewire\Warehouses\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Warehouse\Http\Requests\StoreWarehouseRequest;
use Modules\Warehouse\Interfaces\WarehouseServiceInterface;
use Ramsey\Uuid\Type\Decimal;
use Modules\Warehouse\Models\Warehouse;
use Modules\Warehouse\Enums\WarehouseType;

class Create extends Component
{
    public string $name = '';
    public string $location = '';
    public float $capacity = 0.0;
    public bool $is_default = false;
    public ?string $type = null;
    // public array $employees = [];

    public bool $hasDefaultWarehouse = false;

    /**
     * Check if a default warehouse already exists.
     */
    protected function checkDefaultWarehouse(): void
    {
        $this->hasDefaultWarehouse = Warehouse::where('is_default', true)->exists();
    }

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreWarehouseRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    /**
     * Store the new Warehouse in the database.
     */
    public function submit(WarehouseServiceInterface $service): void
    {

        $validated = $this->validate();
        // Enforce single default warehouse logic
        if ($this->is_default && $this->hasDefaultWarehouse) {
            $this->addError('is_default', __('There is already a default warehouse.'));
            return;
        }
        $service->create($validated);

        $this->resetForm();

        // Close the modal on the frontend
        $this->dispatch('create-warehouse-modal');

        // Refresh the Warehouse table
        $this->dispatch('refreshData')->to(GetData::class);

        // Notify success
        LivewireAlert::title(__('Success'))
            ->text(__('Warehouse added successfully.'))
            ->success()
            ->show();
    }

    /**
     * Reset all form values and errors.
     */
    public function resetForm(): void
    {
        $this->reset(['name', 'location', 'capacity', 'is_default', 'type']);
        $this->type = WarehouseType::cases()[0]->value;
        $this->resetValidation();
        $this->resetErrorBag();
        $this->checkDefaultWarehouse();
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
     * Render the create Warehouse form.
     */
    public function render()
    {
        $this->checkDefaultWarehouse();
        // $this->employees = \App\Models\User::select('id', 'name')->get()->toArray(); // أو أي موديل يمثل الموظفين

        return view('warehouse::livewire.warehouses.partials.create', [
            'types' => WarehouseType::cases(),
        ]);
    }
}
