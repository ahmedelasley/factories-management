<?php

namespace Modules\Extra\Observers;

use Modules\Extra\Models\Attribute;
use Illuminate\Support\Facades\Auth;

class AttributeObserver
{
    /**
     * Handle the Attribute "creating" event.
     */
    public function creating(Attribute $attribute): void
    {
        if (Auth::check()) {
            $attribute->creator_id = Auth::id();
            $attribute->creator_type = Auth::user()::class;
        }
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
        if (Auth::check()) {
            $attribute->editor_id = Auth::id();
            $attribute->editor_type = Auth::user()::class;
        }
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
