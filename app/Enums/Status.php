<?php

namespace App\Enums;

enum Status: string
{
    case ACTIVE = "Active";
    case INACTIVE = "Inactive";

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

    public function btnClass(): string
    {
        return match($this) {
            self::ACTIVE => 'btn-success',
            self::INACTIVE => 'btn-danger',
        };
    }
    public function icon(): string
    {
        return match($this) {
            self::ACTIVE => 'fa fa-check',
            self::INACTIVE => 'fa fa-times',
        };
    }
    public function textColor(): string
    {
        return match($this) {
            self::ACTIVE => 'text-success',
            self::INACTIVE => 'text-danger',
        };
    }


    public function bgColor(): string
    {
        return match($this) {
            self::ACTIVE => 'bg-success',
            self::INACTIVE => 'bg-danger',
        };
    }
    public function borderColor(): string
    {
        return match($this) {
            self::ACTIVE => 'border-success',
            self::INACTIVE => 'border-danger',
        };
    }

}
