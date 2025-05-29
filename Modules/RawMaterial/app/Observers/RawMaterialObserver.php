<?php

namespace Modules\RawMaterial\Observers;

use Modules\RawMaterial\Models\RawMaterial;
use Illuminate\Support\Facades\Auth;

class RawMaterialObserver
{
    /**
     * Handle the RawMaterial "creating" event.
     */
    public function creating(RawMaterial $rawMaterial): void
    {
        if (Auth::check()) {
            $rawMaterial->creator_id = Auth::id();
            $rawMaterial->creator_type = Auth::user()::class;
        }
    }

    /**
     * Handle the RawMaterial "created" event.
     */
    public function created(RawMaterial $rawMaterial): void {}

    /**
     * Handle the RawMaterial "updating" event.
     */
    public function updating(RawMaterial $rawMaterial): void
    {
        if (Auth::check()) {
            $rawMaterial->editor_id = Auth::id();
            $rawMaterial->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the RawMaterial "updated" event.
     */
    public function updated(RawMaterial $rawMaterial): void {}

    /**
     * Handle the RawMaterial "deleted" event.
     */
    public function deleted(RawMaterial $rawMaterial): void {}

    /**
     * Handle the RawMaterial "restored" event.
     */
    public function restored(RawMaterial $rawMaterial): void {}

    /**
     * Handle the RawMaterial "force deleted" event.
     */
    public function forceDeleted(RawMaterial $rawMaterial): void {}
}
