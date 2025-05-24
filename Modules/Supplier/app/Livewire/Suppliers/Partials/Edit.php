<?php

namespace Modules\Supplier\Livewire\Suppliers\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Livewire\Suppliers\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Http\Requests\UpdateSupplierRequest;
use Modules\Supplier\Interfaces\SupplierServiceInterface;

class Edit extends Component
{


    /** @var Supplier|null */
    public $model = null;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $address = '';
    public string $notes = '';

    protected $listeners = ['edit_supplier'];

    public function edit_supplier($id)
    {
        $this->model = Supplier::findOrFail($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Supplier not found.'))
            ->error()
            ->show();

            return;
        }

        // Set the properties
        $this->name = $this->model->name;
        $this->email = $this->model->email;
        $this->phone = $this->model->phone;
        $this->address = $this->model->address;
        $this->notes = $this->model->notes;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('edit-supplier-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdatevalueRequest())->rules();
        return (new UpdateSupplierRequest($this->model?->id))->rules();

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
    public function submit(SupplierServiceInterface $service): void
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
        $this->dispatch('edit-supplier-modal');

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

        return view('supplier::livewire.suppliers.partials.edit');
    }

}
