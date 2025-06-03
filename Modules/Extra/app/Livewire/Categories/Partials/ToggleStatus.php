<?php

namespace Modules\Extra\Livewire\Categories\Partials;

use Livewire\Component;
use Modules\Extra\Models\Category;
use Modules\Extra\Livewire\Categories\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Interfaces\CategoryServiceInterface;
use App\Enums\Status;

class ToggleStatus extends Component
{

    /** @var Category|null */
    public $model = null;
    public $status;

    protected $listeners = ['toggle_status_category'];
    public function toggle_status_category($id)
    {
        $this->model = Category::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Category not found.'))
            ->error()
            ->show();

            return;
        }
        $this->status = $this->model?->status;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('toggle-status-category-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(CategoryServiceInterface $service): void
    {

        $data = [
            'status' => $this->status === Status::ACTIVE ? Status::INACTIVE : Status::ACTIVE,
        ];

        $service->update($this->model, $data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('toggle-status-category-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Category Updated successfully.'))
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
        return view('extra::livewire.suppliers.partials.toggle-status');
    }

}
