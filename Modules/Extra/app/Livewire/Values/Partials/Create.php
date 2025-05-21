<?php

namespace Modules\Extra\Livewire\Values\Partials;

use Livewire\Component;
use Modules\Extra\Livewire\Values\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\StoreValueRequest;
use Modules\Extra\Interfaces\ValueServiceInterface;

class Create extends Component
{
    public string $value = '';

    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreValueRequest())->rules();
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
        $service->create($data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('create-value-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__(' added successfully.'))
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
        return view('extra::livewire.values.partials.create');
    }
}
