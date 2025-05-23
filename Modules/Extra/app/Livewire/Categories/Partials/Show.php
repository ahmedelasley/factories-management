<?php

namespace Modules\Extra\Livewire\Categories\Partials;

use Livewire\Component;
use Modules\Extra\Models\Category;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Show extends Component
{

    public $model;

    // public $valueAttributes = [];

    protected $listeners = ['show_category'];
    public function show_category($id)
    {
        $this->model = Category::with('creator', 'editor', 'parent', 'children')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
                ->text(__('Category not found.'))
                ->error()
                ->show();

            return;
        }

        // Set the properties

        // $this->valueAttributes = $this->model?->attributes;

        // Open modal
        $this->dispatch('show-category-modal');
    }


    public function close()
    {
        // Reset form fields
        $this->reset();

        // Reset validation errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Close modal
        $this->dispatch('refreshData');
    }

    /**
     * عرض واجهة إنشاء الخاصية.
     */
    public function render()
    {
        return view('extra::livewire.categories.partials.show');
    }

}
