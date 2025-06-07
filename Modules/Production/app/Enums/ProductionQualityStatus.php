<?php

namespace Modules\Production\Enums;

enum ProductionQualityStatus: string
{
    case ACCEPTED = "Accepted";
    case REJECTED = "Rejected";

    public function label(): string
    {
        return __($this->value);
    }
}
