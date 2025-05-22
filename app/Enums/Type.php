<?php

namespace App\Enums;

enum Type: string
{
    case NONE = 'none';
    case PRODUCT = 'product';
    case Material = 'material';
    case VALUE = 'value';    


    public function label(): string
    {
        return __($this->value);
    }

}
