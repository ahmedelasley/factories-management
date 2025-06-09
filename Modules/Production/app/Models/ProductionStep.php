<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductionStep extends Model
{
    use HasFactory, HasUserActions;

    protected $table = 'production_steps';
    protected $fillable = [
        'production_order_id',
        'started_at',
        'finished_at',
        'step',
        'status',
        'creator_type','creator_id',
        'editor_type','editor_id',
    ];

    protected $casts = [
        'step' => \Modules\Production\Enums\ProductionStep::class,
        'status' => \Modules\Production\Enums\ProductionStepStatus::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function productionOrder(): HasMany
    {
        return $this->hasMany(ProductionOrder::class);
    }

}
