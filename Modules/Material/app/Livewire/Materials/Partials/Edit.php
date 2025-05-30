<?php

namespace Modules\Material\Livewire\Materials\Partials;

use Livewire\Component;
use Modules\Material\Models\Material;
use Modules\Material\Livewire\Materials\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Material\Http\Requests\UpdateMaterialRequest;
use Modules\Material\Interfaces\MaterialServiceInterface;

class Edit extends Component
{


    /** @var Material|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public string $storage_unit = '';
    public string $ingredient_unit = '';
    public float $conversion_factor = 1;

    protected $listeners = ['edit_material'];

    public function edit_material($id)
    {
        $this->model = Material::findOrFail($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Material not found.'))
            ->error()
            ->show();

            return;
        }

        // Set the properties
        $this->name = $this->model->name;
        $this->description = $this->model->description;
        $this->storage_unit = $this->model->storage_unit;
        $this->ingredient_unit = $this->model->ingredient_unit;
        $this->conversion_factor = $this->model->conversion_factor;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('edit-material-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdatevalueRequest())->rules();
        return (new UpdateMaterialRequest($this->model?->id))->rules();

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
    public function submit(MaterialServiceInterface $service): void
    {
        $validated = $this->validate();
        // dd($validated);
        // if (isset($validated['parent_id']) && $validated['parent_id'] == '') {
        //     $validated['parent_id'] = null;
        // }


        $service->update( $this->model, $validated);



        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('edit-material-modal');

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

        return view('material::livewire.materials.partials.edit');
    }

}
