<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Relations\HasMany;
class ProductionQuality extends Model
{
    use HasFactory, HasUserActions;

    protected $table = 'production_qualities';
    protected $fillable = [
        'production_order_id',
        'employee_type','employee_id',
        'date',
        'notes',
        'status',
        'creator_type','creator_id',
        'editor_type','editor_id',
    ];

    protected $casts = [
        'status' => \Modules\Production\Enums\ProductionQualityStatus::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function productionOrder(): HasMany
    {
        return $this->hasMany(ProductionOrder::class);
    }
}
