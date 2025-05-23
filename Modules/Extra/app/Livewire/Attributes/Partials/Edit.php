<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Cache;
use Modules\Extra\Livewire\Attributes\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\UpdateAttributeRequest;
use Modules\Extra\Interfaces\AttributeServiceInterface;

class Edit extends Component
{
    /** @var Attribute|null */
    public $model = null;
    public string $attribute;

    protected $listeners = ['edit_attribute'];

    public function edit_attribute($id)
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
        $this->attribute = $this->model->attribute;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('edit-attribute-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdateAttributeRequest())->rules();
        return (new UpdateAttributeRequest($this->model?->id))->rules();

    }

    /**
     * تحقق فوري عند تحديث أي حقل.
     */
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(AttributeServiceInterface $service): void
    {
        $validated = $this->validate();

        $data = [
            'attribute' => $validated['attribute'],
        ];

        $service->update($this->model, $data);

        // Attribute::create([
        //     'attribute' => $validated['attribute'],
        // ]);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('edit-attribute-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Attribute Updated successfully.'))
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
        return view('extra::livewire.attributes.partials.edit');
    }

}
