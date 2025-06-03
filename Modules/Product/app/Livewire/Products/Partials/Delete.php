<?php

namespace Modules\Product\Livewire\Products\Partials;

use Livewire\Component;
use Modules\Product\Models\Product;
use Modules\Product\Livewire\Products\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Product\Interfaces\ProductServiceInterface;

class Delete extends Component
{

    /** @var Product|null */
    public $model = null;

    public string $name;

    protected $listeners = ['delete_product'];
    public function delete_product($id)
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

        // Set the properties
        $this->name     = $this->model->name;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('delete-product-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(ProductServiceInterface $service): void
    {

        $service->delete($this->model);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('delete-product-modal');

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
        return view('product::livewire.products.partials.delete');
    }

}
