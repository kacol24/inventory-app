<?php

namespace App\Models;

use App\StorableEvents\InventoryCategoryCreated;
use App\StorableEvents\InventoryCategoryDeleted;
use App\StorableEvents\InventoryCategoryUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class InventoryCategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'is_active',
        'name',
    ];

    public static function createWithAttributes($attributes)
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new InventoryCategoryCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public function updateWithAttributes($attributes)
    {
        event(new InventoryCategoryUpdated($this->uuid, $attributes));
    }

    public function remove()
    {
        event(new InventoryCategoryDeleted($this->uuid));
    }

    public static function uuid(string $uuid)
    {
        return static::where('uuid', $uuid)->first();
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
