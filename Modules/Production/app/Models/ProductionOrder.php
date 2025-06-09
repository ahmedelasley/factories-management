<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionOrder extends Model
{
    use HasFactory, HasUserActions;

    protected $table = 'production_orders';
    protected $fillable = [
        'product_type','product_id',
        'quantity',
        'started_at',
        'finished_at',
        'notes',
        'status',
        'creator_type','creator_id',
        'editor_type','editor_id',
    ];

    protected $casts = [
        'started_at' => 'datetime:Y-m-d H:i:s',
        'finished_at' => 'datetime:Y-m-d H:i:s',
        'status' => \Modules\Production\Enums\ProductionStatus::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Get the ProductionLine associated with the ProductionOrder.
     * A ProductionOrder can have one ProductionLine.
     */
    public function productionLine(): BelongsTo
    {
        return $this->belongsTo(ProductionLine::class)->withDefault([
            'name' => __('Unknown')
        ]);
    }


}
