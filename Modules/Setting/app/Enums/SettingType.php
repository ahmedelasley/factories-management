<?php

namespace Modules\Setting\Enums;
use Illuminate\Support\Str;

enum SettingType: string
{
    case GENERAL = 'general';
    case SYSTEM = 'system';
    case USER = 'user';
    case ROLE = 'role';
    case PERMISSION = 'permission';
    case MODULE = 'module';
    case APPEARANCE = 'appearance';
    case LANGUAGE = 'language & Region';
    case NOTIFICATION = 'notification';
    case CUSTOM = 'custom';

    public function icon(): string
    {
        return match($this) {
            self::GENERAL       => 'fe fe-home',
            self::SYSTEM    => 'fe fe-grid',
            self::USER => 'fe fe-users',
            self::ROLE => 'fe fe-user-check',
            self::PERMISSION => 'fe fe-lock',
            self::MODULE => 'fe fe-layers',
            self::APPEARANCE => 'fa fa-palette',
            self::LANGUAGE => 'fe fe-flag',
            self::NOTIFICATION => 'fe fe-bell',
            self::CUSTOM => 'fa fa-cog',

        };
    }

    public function label(): string
    {
        $translated = __($this->value);

        if ($translated === $this->value) {
            return Str::title(str_replace(['-', '_'], ' ', $this->value));
        }
    
        return $translated;
    }


}
