<?php

namespace Modules\Product\Livewire\Products\Partials;

use Livewire\Component;
use Modules\Product\Models\Product;
use Modules\Product\Livewire\Products\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Product\Interfaces\ProductServiceInterface;
use App\Enums\Status;

class ToggleStatus extends Component
{

    /** @var Product|null */
    public $model = null;

    public $status;

    protected $listeners = ['toggle_status_product'];
    public function toggle_status_product($id)
    {
        $this->model = Product::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Product not found.'))
            ->error()
            ->show();

            return;
        }
        $this->status = $this->model?->status;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('toggle-status-product-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(ProductServiceInterface $service): void
    {

        $data = [
            'status' => $this->status === Status::ACTIVE ? Status::INACTIVE : Status::ACTIVE,
        ];
        $service->update($this->model, $data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('toggle-status-product-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Product Updated successfully.'))
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
        return view('product::livewire.products.partials.toggle-status');
    }

}
