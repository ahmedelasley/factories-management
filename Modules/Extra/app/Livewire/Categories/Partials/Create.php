<?php

namespace Modules\Extra\Livewire\Categories\Partials;

use Livewire\Component;
use Modules\Extra\Livewire\Categories\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\StoreCategoryRequest;
use Modules\Extra\Interfaces\CategoryServiceInterface;

class Create extends Component
{
    public string $name = '';
    public string $description = '';
    public $parent_id = null;
    
    public string $type = 'none';
    public string $status = 'Active';

    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        return (new StoreCategoryRequest())->rules();
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
    public function submit(CategoryServiceInterface $service): void
    {
        $validated = $this->validate();


        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'status' => $validated['status'],
        ];
        $service->create($data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('create-category-modal');

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
        return view('extra::livewire.categories.partials.create');
    }
}
