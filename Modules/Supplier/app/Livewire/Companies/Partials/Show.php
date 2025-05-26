<?php

namespace Modules\Supplier\Livewire\Companies\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Company;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Show extends Component
{

    /** @var Company|null */
    public $model;


    protected $listeners = ['show_company'];
    public function show_company($id)
    {
        $this->model = Company::with('creator', 'editor', 'supplier')->find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
                ->text(__('Company not found.'))
                ->error()
                ->show();

            return;
        }

        // Open modal
        $this->dispatch('show-company-modal');
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
        return view('supplier::livewire.companies.partials.show');

    }

}
