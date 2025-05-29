<?php

namespace Modules\Supplier\Livewire\Companies\Partials;

use Livewire\Component;
use Modules\Supplier\Models\Company;
use Modules\Supplier\Livewire\Companies\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Supplier\Interfaces\CompanyServiceInterface;
use App\Enums\Status;

class ToggleStatus extends Component
{

    /** @var Company|null */
    public $model = null;

    protected $listeners = ['toggle_status_company'];
    public function toggle_status_company($id)
    {
        $this->model = Company::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Supplier not found.'))
            ->error()
            ->show();

            return;
        }

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('toggle-status-company-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(CompanyServiceInterface $service): void
    {

        $data = [
            'status' => $this->status === Status::ACTIVE ? Status::INACTIVE : Status::ACTIVE,
        ];

        $service->update($this->model, $data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('toggle-status-company-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Company Updated successfully.'))
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
        return view('supplier::livewire.companies.partials.toggle-status');
    }

}
