<?php

namespace Modules\Extra\Observers;

use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Auth;

class AttributeObserverObserver
{
    /**
     * Handle the Attribute "creating" event.
     */
    public function creating(Attribute $attribute): void
    {
        $attribute->creator_id = Auth::id();
        $attribute->creator_type = Auth::user()::class;
    }

    /**
     * Handle the Attribute "created" event.
     */
    public function created(Attribute $attribute): void {}

    /**
     * Handle the Attribute "updating" event.
     */
    public function updating(Attribute $attribute): void
    {
        $attribute->updater_id = Auth::id();
        $attribute->updater_type = Auth::user()::class;
    }

    /**
     * Handle the Attribute "updated" event.
     */
    public function updated(Attribute $attribute): void {}

    /**
     * Handle the Attribute "deleted" event.
     */
    public function deleted(Attribute $attribute): void {}

    /**
     * Handle the Attribute "restored" event.
     */
    public function restored(Attribute $attribute): void {}

    /**
     * Handle the Attribute "force deleted" event.
     */
    public function forceDeleted(Attribute $attribute): void {}
}
