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


    // swap Vlaues
    public function swap(): Status
    {
        return match($this) {
            self::ACTIVE => self::INACTIVE,
            self::INACTIVE => self::ACTIVE,
        };
    }
    //swap btnLabel
    public function swapBtnLabel(): string
    {
        return match($this) {
            self::ACTIVE => __('Deactivate'),
            self::INACTIVE => __('Activate'),
        };
    }
    //swap btnClass
    public function swapBtnClass(): string
    {
        return match($this) {
            self::ACTIVE => 'btn-danger',
            self::INACTIVE => 'btn-success',
        };
    }
    //swap icon
    public function swapIcon(): string
    {
        return match($this) {
            self::ACTIVE => 'fa fa-times',
            self::INACTIVE => 'fa fa-check',
        };
    }
    //swap textColor
    public function swapTextColor(): string
    {
        return match($this) {
            self::ACTIVE => 'text-danger',
            self::INACTIVE => 'text-success',
        };
    }
    public function swapBgColor(): string
    {
        return match($this) {
            self::ACTIVE => 'bg-danger',
            self::INACTIVE => 'bg-success',
        };
    }
    public function swapBorderColor(): string
    {
        return match($this) {
            self::ACTIVE => 'border-danger',
            self::INACTIVE => 'border-success',
        };
    }



}
