<?php

namespace Modules\Extra\Livewire\Values\Partials;

use Livewire\Component;
use Modules\Extra\Models\Value;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Show extends Component
{

    /** @var Value|null */
    public $model = null;
    public $valueAttributes = [];

    protected $listeners = ['show_value'];
    public function show_value($id)
    {
        $this->model = Value::with('attributes')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
                ->text(__('Value not found.'))
                ->error()
                ->show();

            return;
        }

        // Set the properties

        $this->valueAttributes = $this->model?->attributes;

        // Open modal
        $this->dispatch('show-value-modal');
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
        return view('extra::livewire.values.partials.show');
    }

}
