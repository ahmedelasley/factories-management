<?php

namespace Modules\Product\Models;

use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUserActions;

    protected $table = 'products'; // اختياري إن كان الاسم مختلفًا عن 'products'
    protected $fillable = [
        'name',
        'code',
        'slug',
        'description',
        'storage_unit',
        'ingredient_unit',
        'conversion_factor',
        'last_updated',
        'status',
        'creator_type','creator_id',
        'editor_type','editor_id',
    ];

    protected $casts = [
        'conversion_factor' => 'decimal:4',
        'last_updated'      => 'datetime',

        'status' => \App\Enums\Status::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];


}
