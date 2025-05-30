<?php

namespace Modules\Material\Observers;

use Modules\Material\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Modules\Material\Services\MaterialCodeGeneratorService;



class MaterialObserver
{
    /**
     * Handle the Material "creating" event.
     */
    public function creating(Material $material): void
    {
        // Generate a unique code (you can use UUID or custom logic)
        // $material->code = 'MAT-' . strtoupper(uniqid());
        if (empty($material->code)) {
            $material->code = app(MaterialCodeGeneratorService::class)->generate();
        }
        // Generate slug from name (assuming name is set before saving)
        $material->slug = Str::slug($material->name);

        if (Auth::check()) {
            $material->creator_id = Auth::id();
            $material->creator_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Material "created" event.
     */
    public function created(Material $material): void {}

    /**
     * Handle the Material "updating" event.
     */
    public function updating(Material $material): void
    {
        // Update the slug only if the name has changed
        if ($material->isDirty('name')) {
            $material->slug = Str::slug($material->name);
        }
        $material->last_updated = now(); // يتم تحديث آخر تعديل تلقائيًا

        if (Auth::check()) {
            $material->editor_id = Auth::id();
            $material->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Material "updated" event.
     */
    public function updated(Material $material): void {}

    /**
     * Handle the Material "deleted" event.
     */
    public function deleted(Material $material): void {}

    /**
     * Handle the Material "restored" event.
     */
    public function restored(Material $material): void {}

    /**
     * Handle the Material "force deleted" event.
     */
    public function forceDeleted(Material $material): void {}
}
