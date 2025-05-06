<?php


namespace Modules\Setting\Livewire\Setting;

use Livewire\Component;
use Modules\Setting\Models\Setting;
use Modules\Setting\Enums\SettingStatus;

class ToggleStatus extends Component
{
    public $setting;
    public $status;

    public function toggleStatus()
    {
        $this->status = $this->setting->status == SettingStatus::ACTIVE ? SettingStatus::INACTIVE : SettingStatus::ACTIVE;

        $this->setting->update([
            'status' => $this->status,
        ]);

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Product created successfully!'
        ]);
    
    }
    /**
     * Render the Livewire view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('setting::livewire.setting.toggle-status');
    }
}
