<?php

namespace Modules\Supplier\Models;

use App\Traits\HasCreatorAndEditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory, HasCreatorAndEditor;
    protected $table = 'suppliers';

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
    /**
     * Get the companies associated with the supplier.
     * supplier can be associated with multiple companies.
     * Companies can have one suppler.
     */
    public function companies(): HasMany

    {
        return $this->hasMany(Company::class);
    }

}
