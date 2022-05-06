<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class InventoryCategoryCreated extends ShouldBeStored
{
    public $inventoryCategoryAttributes;

    public function __construct($inventoryCategoryAttributes)
    {
        $this->inventoryCategoryAttributes = $inventoryCategoryAttributes;
    }
}
