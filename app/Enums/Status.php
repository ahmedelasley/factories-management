<?php

namespace App\Enums;

enum Status: string
{
    case INACTIVE = "Active";
    case ACTIVE = "Inactive";

    public function isActive(): bool
    {
        return $this === self::ACTIVE;
    }

    public function isInactive(): bool
    {
        return $this === self::INACTIVE;
    }
    public function label(): string
    {
        return __($this->value);
    }

    
    public function btnLabel(): string
    {
        return match($this) {
            self::ACTIVE => __('Activate'),
            self::INACTIVE => __('Deactivate'),
        };
    }

}
