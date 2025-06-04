<?php

namespace Modules\Warehouse\Enums;

enum WarehouseType: string
{
    case MIX = 'Mix';    
    case Material = 'Material';
    case PRODUCT = 'Product';


    public function label(): string
    {
        return __($this->value);
    }

}
