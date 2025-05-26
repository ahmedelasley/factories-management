<?php

namespace Modules\Supplier\Livewire\Companies\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Supplier;
use Modules\Supplier\Models\Company;
use Modules\Supplier\Livewire\Companies\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Http\Requests\UpdateCompanyRequest;
use Modules\Supplier\Interfaces\CompanyServiceInterface;

class Edit extends Component
{


    /** @var Company|null */
    public $model = null;

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $address = '';
    public ?int $supplier_id = null;

    public string $notes = '';

    protected $listeners = ['edit_company'];

    public function edit_company($id)
    {
        $this->model = Company::findOrFail($id);

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
        $this->supplier_id = $this->model->supplier_id;
        $this->address = $this->model->address;
        // $this->notes = $this->model->notes;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('edit-company-modal');
    }


    /**
     * قواعد التحقق باستخدام FormRequest.
     */
    protected function rules(): array
    {
        // return (new UpdatevalueRequest())->rules();
        return (new UpdateCompanyRequest($this->model?->id))->rules();

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
    public function submit(CompanyServiceInterface $service): void
    {
        $validated = $this->validate();
        if (isset($validated['supplier_id']) && $validated['supplier_id'] == '') {
            $validated['supplier_id'] = null;
        }


        $service->update( $this->model, $validated);



        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('edit-company-modal');

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
        $data = Supplier::select('id', 'name')->with(['creator', 'editor', 'companies'])->get();
        return view('supplier::livewire.companies.partials.edit',
            [
                'data' => $data,
            ]
        ); 
    }

}
