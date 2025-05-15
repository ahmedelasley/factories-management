<?php

namespace Modules\Extra\Observers;

use Modules\Extra\Models\Attachment;
use Illuminate\Support\Facades\Auth;

class AttachmentObserver
{

    /**
     * Handle the Attachment "creating" event.
     */
    public function creating(Attachment $attachment): void
    {
        if (Auth::check()) {
            $attachment->creator_id = Auth::id();
            $attachment->creator_type = Auth::user()::class;
        }
    }
    
    /**
     * Handle the Attachment "created" event.
     */
    public function created(Attachment $attachment): void {}

    /**
     * Handle the Attachment "updating" event.
     */
    public function updating(Attachment $attachment): void
    {
        if (Auth::check()) {
            $attachment->updater_id = Auth::id();
            $attachment->updater_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Attachment "updated" event.
     */
    public function updated(Attachment $attachment): void {}

    /**
     * Handle the Attachment "deleted" event.
     */
    public function deleted(Attachment $attachment): void {}

    /**
     * Handle the Attachment "restored" event.
     */
    public function restored(Attachment $attachment): void {}

    /**
     * Handle the Attachment "force deleted" event.
     */
    public function forceDeleted(Attachment $attachment): void {}
}
