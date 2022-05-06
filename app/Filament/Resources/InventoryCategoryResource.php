<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryCategoryResource\Pages;
use App\Filament\Resources\InventoryCategoryResource\RelationManagers;
use App\Models\InventoryCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class InventoryCategoryResource extends Resource
{
    protected static ?string $navigationGroup = 'Master';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $model = InventoryCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Toggle::make('is_active')->default(true)->columns(12),
                Forms\Components\TextInput::make('name')->required()->columns(12),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageInventoryCategories::route('/'),
        ];
    }
}
