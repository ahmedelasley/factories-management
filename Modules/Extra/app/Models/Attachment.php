<?php

namespace Modules\Extra\Models;

use App\Traits\HasUserActions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Extra\Database\Factories\AttachmentFactory;
use Illuminate\Support\Str;

class Attachment extends Model
{
    use HasFactory, HasUserActions;

    public $incrementing = false;
    protected $keyType = 'string'; // UUID is stored as string

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id', 'file_name', 'file_path', 'file_size', 'file_type',
        'attachable_id', 'attachable_type',
        'creator_id', 'creator_type',
        'editor_id', 'editor_type',
        'description', 'status'
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the model when it is created
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // The attachable relationship allows you to define a polymorphic relationship
    // This means that the attachment can belong to any model
    public function attachable()
    {
        return $this->morphTo();
    }



}
