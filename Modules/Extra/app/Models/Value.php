<?php

namespace Modules\Extra\Models;

use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Extra\Database\Factories\ValueFactory;

class Value extends Model
{
    use HasFactory, HasUserActions;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'value',
        'category_id',
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

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_value')
                    ->withTimestamps()
                    ->withPivot('status', 'creator_type', 'creator_id', 'editor_type', 'editor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
