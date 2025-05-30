<?php

namespace Modules\Material\Livewire\Materials\Partials;

use Livewire\Component;
use Modules\Material\Models\Material;
use Modules\Material\Livewire\Materials\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Material\Interfaces\MaterialServiceInterface;

class Delete extends Component
{

    /** @var Material|null */
    public $model = null;

    public string $name;

    protected $listeners = ['delete_material'];
    public function delete_material($id)
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

        // Set the properties
        $this->name     = $this->model->name;

        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();

        // Open modal
        $this->dispatch('delete-material-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function submit(MaterialServiceInterface $service): void
    {

        $service->delete($this->model);

        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('delete-material-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Deleted successfully.'))
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
        return view('material::livewire.materials.partials.delete');
    }

}
