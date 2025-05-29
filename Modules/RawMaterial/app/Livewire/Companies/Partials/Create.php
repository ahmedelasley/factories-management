<?php

namespace Modules\Supplier\Livewire\Companies\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Livewire\Companies\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Http\Requests\StoreCompanyRequest;
use Modules\Supplier\Interfaces\CompanyServiceInterface;

class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $address = '';
    public ?int $supplier_id = null;
    public string $notes = '';

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreCompanyRequest())->rules();
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
    public function submit(CompanyServiceInterface $service): void
    {

        $validated = $this->validate();
        if (isset($validated['supplier_id']) && $validated['supplier_id'] == '') {
            $validated['supplier_id'] = null;
        }

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->dispatch('create-company-modal');

        // Refresh the Supplier table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('Company added successfully.'))
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
        $data = Supplier::select('id', 'name')->with(['creator', 'editor', 'companies'])->get();
        return view('supplier::livewire.companies.partials.create',
            [
                'data' => $data,
            ]
        );
    }
}
