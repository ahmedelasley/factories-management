<?php

namespace Modules\Warehouse\Livewire\Warehouses\Partials;

use Livewire\Component;
use Modules\Warehouse\Livewire\Warehouses\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Warehouse\Http\Requests\UpdateWarehouseRequest;
use Modules\Warehouse\Interfaces\WarehouseServiceInterface;
use Modules\Warehouse\Models\Warehouse;
use Modules\Warehouse\Enums\WarehouseType;
class Edit extends Component
{

    /** @var Warehouse|null */
    public $model = null;

    public string $name = '';
    public string $location = '';
    public float $capacity = 0.0;
    public bool $is_default = false;
    public ?string $type = null;

    public bool $hasDefaultWarehouse = false;

    /**
     * Check if a default warehouse already exists.
     */
    protected function checkDefaultWarehouse(): void
    {
        $this->hasDefaultWarehouse = Warehouse::where('is_default', true)->exists();
    }

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
        $this->location = $this->model->location;
        $this->capacity = $this->model->capacity;
        $this->is_default = $this->model->is_default;
        $this->type = $this->model->type?->value;

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

        // Enforce single default warehouse logic
        // if ($this->is_default && $this->hasDefaultWarehouse) {
        //     $this->addError('is_default', __('There is already a default warehouse.'));
        //     return;
        // }

        $service->update( $this->model, $validated);



        // إعادة تعيين البيانات المدخلة
        $this->resetForm();

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

    public function resetForm(): void
    {
        $this->reset(['name', 'location', 'capacity', 'is_default', 'type']);
        $this->type = WarehouseType::cases()[0]->value;
        $this->resetValidation();
        $this->resetErrorBag();
        $this->checkDefaultWarehouse();
    }


   /**
     * Cancel and reset.
     */
    public function close(): void
    {
        $this->resetForm();
        $this->dispatch('refreshData');
    }

    /**
     * عرض واجهة إنشاء الخاصية.
     */
    public function render()
    {
        $this->checkDefaultWarehouse();
        // $this->employees = \App\Models\User::select('id', 'name')->get()->toArray(); // أو أي موديل يمثل الموظفين

        return view('warehouse::livewire.warehouses.partials.edit', [
            'types' => WarehouseType::cases(),
        ]);
    }

}
