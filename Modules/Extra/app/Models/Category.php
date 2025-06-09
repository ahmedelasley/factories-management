<?php

namespace Modules\Extra\Models;

use App\Traits\HasHierarchy;
use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Category extends Model
{
    use HasFactory, HasUserActions, HasHierarchy;

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
        'creator_type','creator_id',
        'editor_type','editor_id',
    ];
    protected $casts = [
        'type' => \App\Enums\Type::class,
        'status' => \App\Enums\Status::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];


}
