<?php

namespace Modules\Warehouse\Observers;

use Modules\Warehouse\Models\Warehouse;
use Illuminate\Support\Facades\Auth;
use Modules\Warehouse\Services\WarehouseCodeGeneratorService;

class WarehouseObserver
{
    /**
     * Handle the Warehouse "creating" event.
     */
    public function creating(Warehouse $warehouse): void
    {
        if (empty($warehouse->code)) {
            $warehouse->code = app(WarehouseCodeGeneratorService::class)->generate();
        }

        if (Auth::check()) {
            $warehouse->creator_id = Auth::id();
            $warehouse->creator_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Warehouse "created" event.
     */
    public function created(Warehouse $warehouse): void {}

    /**
     * Handle the Warehouse "updating" event.
     */
    public function updating(Warehouse $warehouse): void
    {
        if (Auth::check()) {
            $warehouse->editor_id = Auth::id();
            $warehouse->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Warehouse "updated" event.
     */
    public function updated(Warehouse $warehouse): void {}

    /**
     * Handle the Warehouse "deleted" event.
     */
    public function deleted(Warehouse $warehouse): void {}

    /**
     * Handle the Warehouse "restored" event.
     */
    public function restored(Warehouse $warehouse): void {}

    /**
     * Handle the Warehouse "force deleted" event.
     */
    public function forceDeleted(Warehouse $warehouse): void {}
}
