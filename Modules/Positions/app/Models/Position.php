<?php

namespace Modules\Positions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Positions\Database\Factories\PositionFactory;

class Position extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PositionFactory
    // {
    //     // return PositionFactory::new();
    // }
}
