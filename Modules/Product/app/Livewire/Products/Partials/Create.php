<?php

namespace Modules\Product\Livewire\Products\Partials;

use Livewire\Component;
use Modules\Product\Livewire\Products\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Product\Http\Requests\StoreProductRequest;
use Modules\Product\Interfaces\ProductServiceInterface;
use Ramsey\Uuid\Type\Decimal;

class Create extends Component
{
    public string $name = '';
    public string $description = '';
    public string $storage_unit = '';
    public string $ingredient_unit = '';
    public float $conversion_factor = 1.0;

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreProductRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    /**
     * Store the new Product in the database.
     */
    public function submit(ProductServiceInterface $service): void
    {

        $validated = $this->validate();

        $service->create($validated);

        $this->reset();

        // Close the modal on the frontend
        $this->dispatch('create-product-modal');

        // Refresh the Product table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('Product added successfully.'))
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
     * Render the create Product form.
     */
    public function render()
    {
        return view('product::livewire.products.partials.create');
    }
}
