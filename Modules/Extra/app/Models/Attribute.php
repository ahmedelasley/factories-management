<?php

namespace Modules\Extra\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Extra\Database\Factories\AttributeFactory;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'attribute',
        'status',
        'creator_id', 'creator_type',
        'updater_id', 'updater_type',
    ];

    // علاقات Polymorphic
    public function creator()
    {
        return $this->morphTo();
    }

    public function updater()
    {
        return $this->morphTo();
    }

    public function values()
    {
        return $this->belongsToMany(Value::class, 'attribute_value')
                    ->withTimestamps()
                    ->withPivot('status', 'creator_type', 'creator_id', 'updater_type', 'updater_id');
    }


}
