<?php

namespace Modules\Supplier\Livewire\Companies\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Company;
use Modules\Supplier\Livewire\Companies\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Interfaces\CompanyServiceInterface;

class Delete extends Component
{

    /** @var Company|null */
    public $model = null;

    public string $name;

    protected $listeners = ['delete_company'];
    public function delete_company($id)
    {
        $this->model = Company::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Company not found.'))
            ->error()
            ->show();
            return;
        }

        // Set the properties
        $this->name     = $this->model->name;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('delete-company-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(CompanyServiceInterface $service): void
    {

        $service->delete($this->model);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('delete-company-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Deleted successfully.'))
            ->success()
            ->show();
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
        return view('supplier::livewire.companies.partials.delete');
    }

}
