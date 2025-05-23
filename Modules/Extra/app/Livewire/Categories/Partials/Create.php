<?php

namespace Modules\Extra\Livewire\Categories\Partials;

use Livewire\Component;
use Modules\Extra\Models\Category;
use Modules\Extra\Livewire\Categories\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\StoreCategoryRequest;
use Modules\Extra\Interfaces\CategoryServiceInterface;

class Create extends Component
{
    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;

    /**
     * Validation rules using FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreCategoryRequest())->rules();
    }

    /**
     * Live validation on updated field.
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    /**
     * Store the new category in the database.
     */
    public function submit(CategoryServiceInterface $service): void
    {
        $validated = $this->validate();
        if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
            $validated['parent_id'] = null;
        }

        $service->create($validated);


        $this->reset();

        // Close the modal on the frontend
        $this->dispatch('create-category-modal');

        // Refresh the category table
        $this->dispatch('refreshData')->to(GetData::class);

        // Show success alert
        LivewireAlert::title(__('Success'))
            ->text(__('Category added successfully.'))
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
     * Render the create category form.
     */
    public function render()
    {
        // Fetch all categories with their parents and children
        $data = Category::select('id', 'name', 'parent_id')->with(['parent', 'children'])->get();
        return view('extra::livewire.categories.partials.create', [
            'data' => $data,

        ]);
    }
}
