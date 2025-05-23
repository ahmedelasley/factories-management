<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Modules\Extra\Livewire\Attributes\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Interfaces\AttributeServiceInterface;

class Detach extends Component
{

    /** @var Attribute|null */
    public $model = null;

    public string $attribute;

    protected $listeners = ['detach_attribute'];
    public function detach_attribute($id)
    {
        $this->model = Attribute::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Attribute not found.'))
            ->error()
            ->show();

            return;
        }

        // Set the properties
        $this->attribute     = $this->model->attribute;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('detach-attribute-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(AttributeServiceInterface $service): void
    {

        $valueIds = $this->model->values->pluck('id')->toArray();
        $service->detachValues($this->model, $valueIds);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('detach-attribute-modal');

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
        return view('extra::livewire.attributes.partials.detach');
    }

}
