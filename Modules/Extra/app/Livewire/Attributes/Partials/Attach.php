<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Modules\Extra\Livewire\Attributes\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use Modules\Extra\Models\Value;

class Attach extends Component
{

    /** @var Attribute|null */
    public $model = null;

    public $values = [];
    public $valueIds = [];
    // public string $attribute;

    protected $listeners = ['attach_attribute'];
    public function attach_attribute($id)
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
        $this->values = Value::pluck('value', 'id')->all();
        $this->valueIds = $this->model->values->pluck('id')->toArray();

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('attach-attribute-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(AttributeServiceInterface $service): void
    {

        // $valueIds = $this->model->values->pluck('id')->toArray();
        $service->attachValues($this->model, $this->valueIds);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('attach-attribute-modal');

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
        return view('extra::livewire.attributes.partials.attach');
    }

}
