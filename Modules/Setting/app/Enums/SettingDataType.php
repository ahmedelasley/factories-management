<?php

namespace Modules\Setting\Enums;

enum SettingDataType : string
{
    case STRING  = 'string';
    case INTEGER = 'integer';
    case BOOLEAN = 'boolean';
    case TEXT    = 'text';
    case JSON    = 'json';
    case EMAIL   = 'email';  // ← Add this

    /**
     * Return the correct HTML input type for each data type.
     */
    public function inputType(): string
    {
        return match($this) {
            self::BOOLEAN => 'checkbox',
            // self::TEXT    => 'textarea',
            self::EMAIL   => 'email',    // ← and map it here
            default        => 'text',
        };
    }
}
