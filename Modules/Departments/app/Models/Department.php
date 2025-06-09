<?php

namespace Modules\Departments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUserActions;
use Modules\Employees\Models\Employee;
use Modules\Positions\Models\Position;
class Department extends Model
{
    use HasFactory, SoftDeletes, HasUserActions;

    protected $fillable = [
        'name', 'description', 'parent_id',
        // Polymorphic Relations for auditing
        'creator_type', 'creator_id',
        'editor_type', 'editor_id',
        'deletor_type', 'deletor_id',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children');
    }
    public function childrenwithTrashed()
    {
        return $this->hasMany(self::class, 'parent_id')->withTrashed();
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
