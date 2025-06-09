<?php

namespace Modules\Warehouse\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Warehouse extends Model
{
    use HasFactory, HasUserActions;

    protected $table = 'warehouses'; // اختياري إن كان الاسم مختلفًا عن 'products'
    protected $fillable = [
        'name',
        'code',
        'location',
        'capacity',
        'is_default',
        'employeeable_type','employeeable_id',
        'type',
        'status',
        'creator_type','creator_id',
        'editor_type','editor_id',
    ];

    protected $casts = [
        'capacity' => 'decimal:4',
        'is_default' => 'boolean',

        'type' => \Modules\Warehouse\Enums\WarehouseType::class,
        'status' => \App\Enums\Status::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

        /**
     * Get the user who last updated the model.
     */
    public function employeeable(): MorphTo
    {
        return $this->morphTo()->withDefault([
            'name' => __('Unknown')
        ]);
    }
}
