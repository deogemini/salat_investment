<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class InventoryProduct extends Model
{
    use HasFactory;

    protected $table = "inventory_products";
    protected $fillable = ['product_name', 'product_description', 'product_category_id', 'retail_price', 'whole_sale_price', 'quantity'];
    protected $guarded = ['id'];
    public $timestamps = true;

    // Define the relationship to ProductCategory
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function purchasedProducts(): HasMany
    {
        return $this->hasMany(ProductPurchase::class, 'product_inventory_id');
    }
    public function purchasedSales(): HasMany
    {
        return $this->hasMany(ProductSales::class, 'product_inventory_id');
    }
}
