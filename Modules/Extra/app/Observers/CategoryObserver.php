<?php

namespace Modules\Extra\Observers;

use Modules\Extra\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    /**
     * Handle the Category "creating" event.
     */
    public function creating(Category $category): void
    {
        // Set the creator_id and creator_type if the user is authenticated
        if (Auth::check()) {
            $category->creator_id = Auth::id();
            $category->creator_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void {
        $category->slug = str($category->name)->slug();
        $category->saveQuietly();
    }

    /**
     * Handle the Category "updating" event.
     */
    public function updating(Category $category): void
    {
        if (Auth::check()) {
            $category->editor_id = Auth::id();
            $category->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void {}

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void {}

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void {}

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void {}
}
