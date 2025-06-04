<?php

namespace Modules\Warehouse\Livewire\Warehouses\Partials;

use Livewire\Component;
use Modules\Warehouse\Models\Warehouse;
use Modules\Warehouse\Livewire\Warehouses\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Warehouse\Interfaces\WarehouseServiceInterface;
use App\Enums\Status;

class ToggleStatus extends Component
{

    /** @var Warehouse|null */
    public $model = null;

    public $status;

    protected $listeners = ['toggle_status_warehouse'];
    public function toggle_status_warehouse($id)
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
        $this->status = $this->model?->status;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('toggle-status-warehouse-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(WarehouseServiceInterface $service): void
    {

        $data = [
            'status' => $this->status === Status::ACTIVE ? Status::INACTIVE : Status::ACTIVE,
        ];
        $service->update($this->model, $data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('toggle-status-warehouse-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Warehouse Updated successfully.'))
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
        return view('warehouse::livewire.warehouses.partials.toggle-status');
    }

}
