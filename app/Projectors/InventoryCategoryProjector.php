<?php

namespace App\Projectors;

use App\Models\InventoryCategory;
use App\StorableEvents\InventoryCategoryCreated;
use App\StorableEvents\InventoryCategoryDeleted;
use App\StorableEvents\InventoryCategoryUpdated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class InventoryCategoryProjector extends Projector
{
    public function onInventoryCategoryCreated(InventoryCategoryCreated $event)
    {
        InventoryCategory::create($event->inventoryCategoryAttributes);
    }

    public function onInventoryCategoryUpdated(InventoryCategoryUpdated $event)
    {
        InventoryCategory::uuid($event->inventoryCategoryUuid)
                         ->update($event->inventoryCategoryAttributes);
    }

    public function onInventoryCategoryDeleted(InventoryCategoryDeleted $event)
    {
        InventoryCategory::uuid($event->inventoryCategoryUuid)
                         ->delete();
    }
}
