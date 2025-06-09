<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait HasUserActions
{
    /**
     * Get the user who created the model.
     */
    public function creator(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'creator_type', 'creator_id')->withDefault([
            'name' => __('Unknown')
        ]);
    }

    /**
     * Get the user who last updated the model.
     */
    public function editor(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'editor_type', 'editor_id')->withDefault([
            'name' => __('Unknown')
        ]);
    }

    /**
     * Get the user who last deleted the model.
     */
    public function deletor(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'deletor_type', 'deletor_id')->withDefault([
            'name' => __('Unknown')
        ]);
    }
}

