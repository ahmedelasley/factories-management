<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait HasCreatorAndEditor
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
        return $this->morphTo(__FUNCTION__, 'updater_type', 'updater_id')->withDefault([
            'name' => __('Unknown')
        ]);
    }
}

