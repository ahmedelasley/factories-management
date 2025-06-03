<?php

namespace Modules\Production\Enums;

enum ProductionStep: string
{
    case CUT = "Cut";
    case SEW = "Sew";
    case BAIL = "Bail";

    public function label(): string
    {
        return __($this->value);
    }
}
