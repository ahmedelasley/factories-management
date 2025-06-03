<?php

namespace Modules\Production\Enums;

enum ProductionStepStatus: string
{
    case PENDING = "Pending";
    case STARTED = "Started";
    case FINISHED = "Finished";

    public function label(): string
    {
        return __($this->value);
    }
}
