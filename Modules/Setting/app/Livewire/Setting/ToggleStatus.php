<?php


namespace Modules\Setting\Livewire\Setting;

use Livewire\Component;
use Modules\Setting\Models\Setting;
use Modules\Setting\Enums\SettingStatus;

class ToggleStatus extends Component
{
    public $setting;
    public $status;

    // public function mount()
    // {
    //     dd($this->Status);
    // }


    public function toggleStatus()
    {
        dd($this->Status);
        $this->setting->status = $status === SettingStatus::ACTIVE
            ? SettingStatus::INACTIVE
            : SettingStatus::ACTIVE;
        $this->setting->save();
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
