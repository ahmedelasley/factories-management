<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Modules\Extra\Livewire\Attributes\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Interfaces\AttributeServiceInterface;

class Delete extends Component
{

    /**
     * خاصية النموذج.
     */
    public $model;

    public string $attribute;

    protected $listeners = ['delete_attribute'];
    public function delete_attribute($id)
    {
        $this->model = Attribute::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Attribute not found.'))
            ->error()
            ->show();
        }

        // Set the properties
        $this->attribute     = $this->model->attribute;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('delete-attribute-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(AttributeServiceInterface $service): void
    {

        $service->delete($this->model);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('delete-attribute-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Attribute Deleted successfully.'))
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
        return view('extra::livewire.attributes.partials.delete');
    }

}
