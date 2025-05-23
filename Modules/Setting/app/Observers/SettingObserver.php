<?php

namespace Modules\Setting\Observers;

use Modules\Setting\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingObserver
{
    /**
     * Handle the Setting "creating" event.
     */
    public function creating(Setting $setting): void {}

    /**
     * Handle the Setting "created" event.
     */
    public function created(Setting $setting): void {}

    /**
     * Handle the Setting "updating" event.
     */
    public function updating(Setting $setting): void
    {
        if (Auth::check()) {
            $setting->editor_id = Auth::id();
            $setting->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Setting "updated" event.
     */
    public function updated(Setting $setting): void {}

    /**
     * Handle the Setting "deleted" event.
     */
    public function deleted(Setting $setting): void {}

    /**
     * Handle the Setting "restored" event.
     */
    public function restored(Setting $setting): void {}

    /**
     * Handle the Setting "force deleted" event.
     */
    public function forceDeleted(Setting $setting): void {}
}
