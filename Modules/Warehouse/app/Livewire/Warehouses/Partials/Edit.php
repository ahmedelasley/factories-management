<?php

namespace Modules\Warehouse\Livewire\Warehouses\Partials;

use Livewire\Component;
use Modules\Warehouse\Models\Warehouse;
use Modules\Warehouse\Livewire\Warehouses\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Warehouse\Http\Requests\UpdateWarehouseRequest;
use Modules\Warehouse\Interfaces\WarehouseServiceInterface;

class Edit extends Component
{


    /** @var Warehouse|null */
    public $model = null;

    public string $name = '';
    public string $description = '';
    public string $storage_unit = '';
    public string $ingredient_unit = '';
    public float $conversion_factor = 1;

    protected $listeners = ['edit_warehouse'];

    public function edit_warehouse($id)
    {
        $this->model = Warehouse::findOrFail($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Warehouse not found.'))
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
        $this->dispatch('edit-warehouse-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdatevalueRequest())->rules();
        return (new UpdateWarehouseRequest($this->model?->id))->rules();

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
    public function submit(WarehouseServiceInterface $service): void
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
        $this->dispatch('edit-warehouse-modal');

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

        return view('warehouse::livewire.warehouses.partials.edit');
    }

}
