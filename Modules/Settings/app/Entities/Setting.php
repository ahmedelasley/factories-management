<?php

namespace Modules\Settings\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'key',
        'value',
        'data_type',
        'description',
        'type',
        'status',
        'created_id',
        'updated_id',
    ];
    // protected $fillable = [
    //     'key',
    //     'value',
    //     'created_id',
    //     'updated_id',
    // ];


    public function scopeType($query, $value)
    {
        return $query->where('type', $value);
    }

}
