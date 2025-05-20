<?php

namespace Modules\Extra\Livewire\Attributes\Partials;

use Livewire\Component;
use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Cache;
use Modules\Extra\Livewire\Attributes\GetData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Modules\Extra\Http\Requests\UpdateAttributeRequest;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use App\Enums\Status;

class ToggleStatus extends Component
{

    /**
     * خاصية النموذج.
     */
    public $model;    
    
    public string $attribute;
    public $status;
    // public $status;
    
    protected $listeners = ['toggle_status_attribute'];
    public function toggle_status_attribute($id)
    {
        $this->model = Attribute::find($id);
    
        if (!$this->model) {
            // Alert 
            LivewireAlert::title(__('Error'))
            ->text(__('Attribute not found.'))
            ->error()
            ->show();
        }
    
        // Set the properties
        $this->attribute     = $this->model->attribute;
        $this->status     = $this->model->status; 
    
        // Reset validation and errors
        $this->resetValidation();
        $this->resetErrorBag();
    
        // Open modal
        $this->dispatch('toggle-status-attribute-modal');
    }


    /**
     * حفظ الخاصية الجديدة في قاعدة البيانات.
     */
    public function updateStatus(AttributeServiceInterface $service): void
    {

        $data = [
            'status' => $this->status === Status::ACTIVE ? Status::INACTIVE : Status::ACTIVE,
        ];

        $service->update($this->model, $data);


        // إعادة تعيين البيانات المدخلة
        $this->reset();

        // إغلاق المودال من الواجهة
        $this->dispatch('toggle-status-attribute-modal');

        // إعادة تحميل الجدول أو قائمة الخصائص
        $this->dispatch('refreshData')->to(GetData::class);

        // إشعار نجاح
        LivewireAlert::title(__('Success'))
            ->text(__('Attribute Updated successfully.'))
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
        return view('extra::livewire.attributes.partials.toggle-status');
    }
    
}
