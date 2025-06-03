<?php

namespace Modules\Production\Enums;

enum ProductionStatus: string
{
    case PLANNED = "Planned";
    case INPROGRESS = "In Progress";
    case COMPLETED = "Complated";
    case FAILED = "Faild";

    public function label(): string
    {
        return __($this->value);
    }
}
