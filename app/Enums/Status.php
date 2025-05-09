<?php

namespace App\Enums;

enum Status: string
{
    case INACTIVE = "inactive";
    case ACTIVE = "active";

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
        return match($this) {
            self::ACTIVE => __('Active'),
            self::INACTIVE => __('Inactive'),
        };
    }
}
