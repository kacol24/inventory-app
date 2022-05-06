<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class InventoryCategoryUpdated extends ShouldBeStored
{
    public $inventoryCategoryUuid;

    public $inventoryCategoryAttributes;

    public function __construct($inventoryCategoryUuid, $inventoryCategoryAttributes)
    {
        $this->inventoryCategoryUuid = $inventoryCategoryUuid;
        $this->inventoryCategoryAttributes = $inventoryCategoryAttributes;
    }
}
