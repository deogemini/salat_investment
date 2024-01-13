<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPurchase extends Model
{
    use HasFactory;
    protected $table = "product_purchases";
    protected $fillable = ['product_inventory_id', 'product_cost', 'quantity', 'total_cost'];
    protected $guarded = ['id'];
    public $timestamps = true;

    // Define the relationship to ProductCategory
    public function productInventory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_inventory_id');
    }
}
