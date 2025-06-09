<?php

namespace Modules\Supplier\Models;

use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, HasUserActions;
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'supplier_id', // Foreign key to associate with Supplier
        'creator_id', 'creator_type',
        'editor_id', 'editor_type',
    ];
    protected $casts = [
        'status' => \App\Enums\Status::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];


    /**
     * Get the supplier associated with the company.
     * A company can have one supplier.
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class)->withDefault([
            'name' => __('Unknown')
        ]);
    }
}
