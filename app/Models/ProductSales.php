<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProductSales extends Model
{
    use HasFactory;

    protected $table = "product_sales";
    protected $fillable = ['product_inventory_id', 'product_cost', 'quantity', 'total_cost'];
    protected $guarded = ['id'];
    public $timestamps = true;

    // Define the relationship to ProductCategory
    public function productInventory(): BelongsTo
    {
        return $this->belongsTo(InventoryProduct::class, 'product_inventory_id');
    }
}
