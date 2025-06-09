<?php

namespace Modules\Production\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Relations\HasMany;
class ProductionMachine extends Model
{
    use HasFactory, HasUserActions;

    protected $table = 'production_machines';
    protected $fillable = [
        'production_order_id',
        'machine_type','machine_id',
        'hours_used',
        'status',
        'creator_type','creator_id',
        'editor_type','editor_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function productionOrder(): HasMany
    {
        return $this->hasMany(ProductionOrder::class);
    }
}
