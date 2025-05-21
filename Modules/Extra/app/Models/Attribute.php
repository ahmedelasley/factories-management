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
        'editor_id', 'editor_type',
    ];
    protected $casts = [
        'status' => \App\Enums\Status::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    // علاقات Polymorphic
    public function creator()
    {
        return $this->morphTo()->withDefault([
            'name' => __('Unknown')
        ]);
    }

    public function editor()
    {
        return $this->morphTo()->withDefault([
            'name' => __('Unknown')
        ]);
    }

    public function values()
    {
        return $this->belongsToMany(Value::class, 'attribute_value')
                    ->withTimestamps()
                    ->withPivot('status', 'creator_type', 'creator_id', 'editor_type', 'editor_id');
    }

}
