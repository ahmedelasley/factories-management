<?php

namespace Modules\Material\Livewire\Materials\Partials;

use Livewire\Component;
use Modules\Material\Models\Material;
use Modules\Material\Livewire\Materials\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Material\Interfaces\MaterialServiceInterface;
use App\Enums\Status;

class ToggleStatus extends Component
{

    /** @var Material|null */
    public $model = null;



    protected $listeners = ['toggle_status_material'];
    public function toggle_status_material($id)
    {
        $this->model = Material::find($id);

        if (!$this->model) {
            // Alert
            LivewireAlert::title(__('Error'))
            ->text(__('Material not found.'))
            ->error()
            ->show();

            return;
        }

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('toggle-status-material-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(MaterialServiceInterface $service): void
    {

        $data = [
            'status' => $this->status === Status::ACTIVE ? Status::INACTIVE : Status::ACTIVE,
        ];
dd($data);
        $service->update($this->model, $data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('toggle-status-material-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Material Updated successfully.'))
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
        return view('material::livewire.materials.partials.toggle-status');
    }

}
