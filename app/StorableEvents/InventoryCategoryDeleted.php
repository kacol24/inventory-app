<?php

namespace App\StorableEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class InventoryCategoryDeleted extends ShouldBeStored
{
    public $inventoryCategoryUuid;

    public function __construct($inventoryCategoryUuid)
    {
        $this->inventoryCategoryUuid = $inventoryCategoryUuid;
    }
}
