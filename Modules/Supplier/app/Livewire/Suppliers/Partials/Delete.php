<?php

namespace Modules\Supplier\Livewire\Suppliers\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Livewire\Suppliers\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Interfaces\SupplierServiceInterface;

class Delete extends Component
{

    /** @var Supplier|null */
    public $model = null;

    public string $name;

    protected $listeners = ['delete_supplier'];
    public function delete_supplier($id)
    {
        $this->model = Supplier::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Supplier not found.'))
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
        $this->dispatch('delete-supplier-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(SupplierServiceInterface $service): void
    {

        $service->delete($this->model);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('delete-supplier-modal');

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
        return view('supplier::livewire.suppliers.partials.delete');
    }

}
