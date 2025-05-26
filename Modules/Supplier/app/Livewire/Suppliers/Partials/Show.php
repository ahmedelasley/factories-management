<?php

namespace Modules\Supplier\Livewire\Suppliers\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Supplier;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Show extends Component
{

    /** @var Supplier|null */
    public $model;


    protected $listeners = ['show_supplier'];
    public function show_supplier($id)
    {
        $this->model = Supplier::with('creator', 'editor', 'companies')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
                ->text(__('Supplier not found.'))
                ->error()
                ->show();

            return;
        }

        // Open modal
        $this->dispatch('show-supplier-modal');
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
        return view('supplier::livewire.suppliers.partials.show');

    }

}
