<?php

namespace Modules\Extra\Livewire\Values\Partials;

use Livewire\Component;
use Modules\Extra\Models\Value;
use Modules\Extra\Livewire\Values\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\UpdateValueRequest;
use Modules\Extra\Interfaces\ValueServiceInterface;

class Edit extends Component
{

    /**
     * خاصية النموذج.
     */
    public $model;

    public string $value;

    protected $listeners = ['edit_value'];

    public function edit_value($id)
    {
        $this->model = Value::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Value not found.'))
            ->error()
            ->show();
        }

        // Set the properties
        $this->value = $this->model->value;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('edit-value-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdatevalueRequest())->rules();
        return (new UpdateValueRequest($this->model?->id))->rules();

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
    public function submit(ValueServiceInterface $service): void
    {
        $validated = $this->validate();

        $data = [
            'value' => $validated['value'],
        ];

        $service->update($this->model, $data);

        // value::create([
        //     'value' => $validated['value'],
        // ]);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('edit-value-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Updated successfully.'))
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
        return view('extra::livewire.values.partials.edit');
    }

}
