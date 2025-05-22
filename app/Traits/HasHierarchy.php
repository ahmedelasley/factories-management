<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
trait HasHierarchy {

    // The parent() method defines a one-to-many relationship with the same model.
    public function parent() : BelongsTo
    {
        // The parent() method defines a one-to-many relationship with the same model.
        return $this->belongsTo(static::class, 'parent_id'); 
    }

    // The children() method defines a one-to-many relationship with the same model.
 
    public function children() : HasMany
    {
        // The children() method defines a one-to-many relationship with the same model.
        return $this->hasMany(static::class, 'parent_id');
    }

}