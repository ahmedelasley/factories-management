<?php

namespace Modules\Extra\Models;

use App\Traits\HasHierarchy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Category extends Model
{
    use HasFactory, HasHierarchy;
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'type',
        'status',
        'creator_id', 'creator_type',
        'editor_id', 'editor_type',
    ];
    protected $casts = [
        'type' => \App\Enums\Type::class,
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

}
