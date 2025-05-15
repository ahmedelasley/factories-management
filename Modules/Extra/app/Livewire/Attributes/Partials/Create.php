<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Modules\Extra\Http\Requests\StoreAttributeRequest;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Livewire\Attributes\GetData;

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
    public function store(): void
    {
        $validated = $this->validate();

        $created = Attribute::create([
            'attribute' => $validated['attribute'],
        ]);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('close-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Attribute added successfully.'))
            ->success()
            ->show();
    }

    /**
     * عرض واجهة إنشاء الخاصية.
     */
    public function render()
    {
        return view('extra::livewire.attributes.partials.create');
    }
}
