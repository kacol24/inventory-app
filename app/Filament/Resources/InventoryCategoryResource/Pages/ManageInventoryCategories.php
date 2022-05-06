<?php

namespace App\Filament\Resources\InventoryCategoryResource\Pages;

use App\Filament\Resources\InventoryCategoryResource;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Model;

class ManageInventoryCategories extends ManageRecords
{
    protected static string $resource = InventoryCategoryResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return static::getModel()::createWithAttributes($data);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->updateWithAttributes($data);

        return $record;
    }

    protected function handleRecordDeletion(Model $record): void
    {
        $record->remove();
    }
}
