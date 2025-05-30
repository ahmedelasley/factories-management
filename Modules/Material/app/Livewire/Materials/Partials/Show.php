<?php

namespace Modules\Material\Livewire\Materials\Partials;

use Livewire\Component;
use Modules\Material\Models\Material;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Show extends Component
{

    /** @var Material|null */
    public $model;


    protected $listeners = ['show_material'];
    public function show_material($id)
    {
        $this->model = Material::with('creator', 'editor')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
                ->text(__('Material not found.'))
                ->error()
                ->show();

            return;
        }

        // Open modal
        $this->dispatch('show-material-modal');
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
        return view('material::livewire.materials.partials.show');

    }

}
