<?php

namespace Modules\Extra\Livewire\Categories\Partials;

use Livewire\Component;
use Modules\Extra\Models\Category;
use Modules\Extra\Livewire\Categories\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\UpdateCategoryRequest;
use Modules\Extra\Interfaces\CategoryServiceInterface;

class Edit extends Component
{

    /**
     * خاصية النموذج.
     */
    public $model;

    public string $name = '';
    public string $description = '';
    public ?int $parent_id = null;

    protected $listeners = ['edit_category'];

    public function edit_category($id)
    {
        $this->model = Category::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Category not found.'))
            ->error()
            ->show();
        }

        // Set the properties
        $this->name = $this->model->name;
        $this->description = $this->model->description;
        $this->parent_id = $this->model->parent_id;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('edit-category-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdatevalueRequest())->rules();
        return (new UpdateCategoryRequest($this->model?->id))->rules();

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
        // dd($validated);
        if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
            $validated['parent_id'] = null;
        }


        $service->update( $this->model, $validated);



        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('edit-category-modal');

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
        $data = Category::select('id', 'name', 'parent_id')
        ->where('id', '!=', $this->model?->id)
        ->with(['parent', 'children'])->get();

        return view('extra::livewire.categories.partials.edit', [
            'data' => $data,
        ]);
    }

}
