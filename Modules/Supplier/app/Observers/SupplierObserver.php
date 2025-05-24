<?php

namespace Modules\Supplier\Observers;

use Modules\Supplier\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierObserver
{
    /**
     * Handle the Supplier "creating" event.
     */
    public function creating(Supplier $supplier): void
    {
        if (Auth::check()) {
            $supplier->creator_id = Auth::id();
            $supplier->creator_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Supplier "created" event.
     */
    public function created(Supplier $supplier): void {}

    /**
     * Handle the Supplier "updating" event.
     */
    public function updating(Supplier $supplier): void
    {
        if (Auth::check()) {
            $supplier->editor_id = Auth::id();
            $supplier->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Supplier "updated" event.
     */
    public function updated(Supplier $supplier): void {}

    /**
     * Handle the Supplier "deleted" event.
     */
    public function deleted(Supplier $supplier): void {}

    /**
     * Handle the Supplier "restored" event.
     */
    public function restored(Supplier $supplier): void {}

    /**
     * Handle the Supplier "force deleted" event.
     */
    public function forceDeleted(Supplier $supplier): void {}
}
