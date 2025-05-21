<?php
namespace Modules\Extra\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Extra\Models\Attribute;

class AttributeValueAttached
{
    use SerializesModels;

    public Attribute $attribute;
    public array $valueIds;

    public function __construct(Attribute $attribute, array $valueIds)
    {
        $this->attribute = $attribute;
        $this->valueIds = $valueIds;
    }
}