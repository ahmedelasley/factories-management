<?php

namespace Modules\Product\Observers;

use Modules\Product\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Modules\Product\Services\ProductCodeGeneratorService;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     */
    public function creating(Product $product): void
    {
        // Generate a unique code (you can use UUID or custom logic)
        // $product->code = 'MAT-' . strtoupper(uniqid());
        if (empty($product->code)) {
            $product->code = app(ProductCodeGeneratorService::class)->generate();
        }
        // Generate slug from name (assuming name is set before saving)
        $product->slug = Str::slug($product->name);

        if (Auth::check()) {
            $product->creator_id = Auth::id();
            $product->creator_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void {}

    /**
     * Handle the Product "updating" event.
     */
    public function updating(Product $product): void
    {
        // Update the slug only if the name has changed
        if ($product->isDirty('name')) {
            $product->slug = Str::slug($product->name);
        }
        $product->last_updated = now(); // يتم تحديث آخر تعديل تلقائيًا

        if (Auth::check()) {
            $product->editor_id = Auth::id();
            $product->editor_type = Auth::user()::class;
        }
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void {}

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void {}

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void {}

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void {}
}
