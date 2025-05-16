<?php

namespace Modules\Extra\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Extra\Database\Factories\ValueFactory;

class Value extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'value',
        'status',
        'creator_id', 'creator_type',
        'editor_id', 'editor_type',
    ];

    // علاقات Polymorphic
    public function creator()
    {
        return $this->morphTo();
    }

    public function editor()
    {
        return $this->morphTo();
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_value')
                    ->withTimestamps()
                    ->withPivot('status', 'creator_type', 'creator_id', 'editor_type', 'editor_id');
    }



}
