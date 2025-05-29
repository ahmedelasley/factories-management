<?php

namespace Modules\Supplier\Livewire\Suppliers\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Livewire\Suppliers\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Http\Requests\StoreSupplierRequest;
use Modules\Supplier\Interfaces\SupplierServiceInterface;

class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $address = '';
    public string $notes = '';

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreSupplierRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    /**
     * Store the new Supplier in the database.
     */
    public function submit(SupplierServiceInterface $service): void
    {

        $validated = $this->validate();
        // if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
        //     $validated['parent_id'] = null;
        // }

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->dispatch('create-supplier-modal');

        // Refresh the Supplier table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('Supplier added successfully.'))
            ->success()
            ->show();
    }

    /**
     * Reset form and validation states.
     */
    public function close(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
        $this->dispatch('refreshData');
    }

    /**
     * Render the create Supplier form.
     */
    public function render()
    {
        return view('supplier::livewire.suppliers.partials.create');
    }
}
