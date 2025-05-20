<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Cache;
use Modules\Extra\Livewire\Attributes\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\StoreAttributeRequest;
use Modules\Extra\Interfaces\AttributeServiceInterface;

class Create extends Component
{
    public string $attribute = '';

    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreAttributeRequest())->rules();
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
        $service->create($data);

        // Attribute::create([
        //     'attribute' => $validated['attribute'],
        // ]);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('create-attribute-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Attribute added successfully.'))
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
        return view('extra::livewire.attributes.partials.create');
    }
}
