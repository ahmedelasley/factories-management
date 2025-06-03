<?php

namespace Modules\Product\Livewire\Products\Partials;

use Livewire\Component;
use Modules\Product\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Show extends Component
{

    /** @var Product|null */
    public $model;


    protected $listeners = ['show_product'];
    public function show_product($id)
    {
        $this->model = Product::with('creator', 'editor')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
                ->text(__('Product not found.'))
                ->error()
                ->show();

            return;
        }

        // Open modal
        $this->dispatch('show-product-modal');
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
        return view('product::livewire.products.partials.show');

    }

}
