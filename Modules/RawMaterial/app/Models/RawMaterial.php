<?php

namespace Modules\RawMaterial\Models;

use App\Traits\HasCreatorAndEditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RawMaterial extends Model
{
    use HasFactory;

    protected $table = 'raw_materials';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'creator_id', 'creator_type',
        'editor_id', 'editor_type',
    ];


    protected $casts = [
        'status' => \App\Enums\Status::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];


}
