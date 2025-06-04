<?php

namespace Modules\Warehouse\Livewire\Warehouses\Partials;

use Livewire\Component;
use Modules\Warehouse\Models\Warehouse;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Show extends Component
{

    /** @var Warehouse|null */
    public $model;


    protected $listeners = ['show_warehouse'];
    public function show_warehouse($id)
    {
        $this->model = Warehouse::with('creator', 'editor')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
                ->text(__('Warehouse not found.'))
                ->error()
                ->show();

            return;
        }

        // Open modal
        $this->dispatch('show-warehouse-modal');
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
        return view('warehouse::livewire.warehouses.partials.show');

    }

}
