<?php

namespace Modules\Setting\Livewire\Setting;

use Livewire\Component;
use Modules\Setting\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Models\Setting;
use Modules\Setting\Services\SettingValidationService;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class Edit extends Component
{

    public Setting $setting;
    public string $value;

    public function mount(Setting $setting): void
    {
        $this->setting = $setting;
        $this->value = $setting->value;
    }

    // Real Time Validation
    protected function rules(): array
    {
        return app(SettingValidationService::class)->rules($this->setting->data_type->value);
    }

    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function edit(): void
    {
        DB::beginTransaction();

        try {
            $validated = $this->validate();
            $validated['value'] = $this->value;
            $this->setting->update($validated);

            DB::commit();

            LivewireAlert::title('Success')
            ->text('Operation completed successfully.')
            ->success()
            ->show();

        } catch (\Throwable $e) {
            DB::rollBack();

            $this->dispatch('alert', [
                'type' => 'danger',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('setting::livewire.setting.edit');
    }
}
