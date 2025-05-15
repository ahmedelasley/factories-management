<?php

namespace Modules\Extra\Observers;

use Modules\Extra\Models\Value;
use Illuminate\Support\Facades\Auth;

class ValueObserver
{
    /**
     * Handle the Value "creating" event.
     */
    public function creating(Value $value): void
    {
        if (Auth::check()) {
            $value->creator_id = Auth::id();
            $value->creator_type = Auth::user()::class;
        }
    }
    
    /**
     * Handle the Value "created" event.
     */
    public function created(Value $value): void {}

    /**
     * Handle the Value "updating" event.
     */
    public function updating(Value $value): void
    {
        if (Auth::check()) {
            $value->updater_id = Auth::id();
            $value->updater_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Value "updated" event.
     */
    public function updated(Value $value): void {}

    /**
     * Handle the Value "deleted" event.
     */
    public function deleted(Value $value): void {}

    /**
     * Handle the Value "restored" event.
     */
    public function restored(Value $value): void {}

    /**
     * Handle the Value "force deleted" event.
     */
    public function forceDeleted(Value $value): void {}
}
