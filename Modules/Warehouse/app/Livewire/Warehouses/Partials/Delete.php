<?php

namespace Modules\Warehouse\Livewire\Warehouses\Partials;

use Livewire\Component;
use Modules\Warehouse\Models\Warehouse;
use Modules\Warehouse\Livewire\Warehouses\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Warehouse\Interfaces\WarehouseServiceInterface;

class Delete extends Component
{

    /** @var Warehouse|null */
    public $model = null;

    public string $name;

    protected $listeners = ['delete_warehouse'];
    public function delete_warehouse($id)
    {
        $this->model = Warehouse::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Warehouse not found.'))
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
        $this->dispatch('delete-warehouse-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(WarehouseServiceInterface $service): void
    {

        $service->delete($this->model);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('delete-warehouse-modal');

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
        return view('warehouse::livewire.warehouses.partials.delete');
    }

}
