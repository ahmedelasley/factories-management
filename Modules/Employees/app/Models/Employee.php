<?php

namespace Modules\Employees\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUserActions;
use Modules\Employees\Enums\EmployeeStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory, SoftDeletes, HasUserActions;

    protected $fillable = [
        'name', 'email', 'phone', 'gender', 'national_id',
        'position_id', 'department_id', 'hire_date', 'photo', 'status',
        // 'creator_type','creator_id',
        // 'editor_type','editor_id',

    ];

    protected $casts = [
        'hire_date' => 'date',
        'status' => EmployeeStatus::class,
    ];

    // public function department(): BelongsTo
    // {
    //     return $this->belongsTo(Department::class);
    // }

    // public function position(): BelongsTo
    // {
    //     return $this->belongsTo(Position::class);
    // }

    // public function contracts(): HasMany
    // {
    //     return $this->hasMany(Contract::class);
    // }

    // public function attendances(): HasMany
    // {
    //     return $this->hasMany(Attendance::class);
    // }

    // public function payrolls(): HasMany
    // {
    //     return $this->hasMany(Payroll::class);
    // }

    // public function evaluations(): HasMany
    // {
    //     return $this->hasMany(Evaluation::class);
    // }

    // public function vacations(): HasMany
    // {
    //     return $this->hasMany(Vacation::class);
    // }

    // public function trainings(): HasMany
    // {
    //     return $this->belongsToMany(Training::class, 'employee_training');
    // }

    // public function resignations(): HasMany
    // {
    //     return $this->hasMany(Resignation::class);
    // }


}
