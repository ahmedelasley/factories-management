<?php

namespace Modules\Supplier\Livewire\Suppliers\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Livewire\Suppliers\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Interfaces\SupplierServiceInterface;
use App\Enums\Status;

class ToggleStatus extends Component
{

    /** @var Supplier|null */
    public $model = null;

    protected $listeners = ['toggle_status_supplier'];
    public function toggle_status_supplier($id)
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

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('toggle-status-supplier-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(SupplierServiceInterface $service): void
    {

        $data = [
            'status' => $this->status === Status::ACTIVE ? Status::INACTIVE : Status::ACTIVE,
        ];

        $service->update($this->model, $data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('toggle-status-supplier-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Supplier Updated successfully.'))
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
        return view('supplier::livewire.suppliers.partials.toggle-status');
    }

}
