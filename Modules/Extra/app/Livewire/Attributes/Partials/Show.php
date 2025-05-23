<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


class Show extends Component
{

    /** @var Attribute|null */
    public $model = null;

    public $values = [];

    protected $listeners = ['show_attribute'];
    public function show_attribute($id)
    {
        $this->model = Attribute::with('values')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Attribute not found.'))
            ->error()
            ->show();

            return;
        }

        // Set the properties

        $this->values = $this->model->values;

        // Open modal
        $this->dispatch('show-attribute-modal');
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
        return view('extra::livewire.attributes.partials.show');
    }

}
