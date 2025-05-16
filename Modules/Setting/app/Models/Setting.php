<?php

namespace Modules\Setting\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Setting\Enums\SettingType;
use Modules\Setting\Enums\SettingDataType;
use Modules\Setting\Enums\SettingStatus;

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

    protected $casts = [
        'type' => SettingType::class,
        'data_type' => SettingDataType::class,
        'status' => SettingStatus::class,
    ];


    /**
     * Get the user that created the setting.
     */
    public function creator(): MorphTo
    {
        return $this->morphTo(null, 'created_id', 'id');
    }

    /**
     * Get the user that updated the setting.
     */
    public function editor(): MorphTo
    {
        return $this->morphTo(null, 'updated_id', 'id');
    }

    /**
     * Scope a query to only include settings of a given data type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  SettingDataType|string  $dataType
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDataType($query, SettingDataType|string $dataType)
    {
        $value = $dataType instanceof SettingDataType
            ? $dataType->value
            : $dataType;

        return $query->where('data_type', $value);
    }


    /**
     * Scope a query to only include settings of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  SettingType|string  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeType($query, SettingType|string $type)
    {
        $value = $type instanceof SettingType
            ? $type->value
            : $type;

        return $query->where('type', $value);
    }

    /**
     * Scope a query to only include settings of a given status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  SettingStatus|string  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, SettingStatus|string $status)
    {
        $value = $status instanceof SettingStatus
            ? $status->value
            : $status;

        return $query->where('status', $value);
    }

        /**
     * Scope a query to only include active settings.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', SettingStatus::ACTIVE);
    }
    /**
     * Scope a query to only include inactive settings.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
    {
        return $query->where('status', SettingStatus::INACTIVE);
    }


}
