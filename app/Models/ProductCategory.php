<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ProductCategory extends Model
{
    use HasFactory;


    public $table ="product_categories";

    protected $fillable = ['category_name', 'description'];
    protected $guarded = ['id'];
    public $timestamps = true;

     // Define the inverse relationship to InventoryProduct
     public function inventoryProducts(): HasMany
     {
         return $this->hasMany(InventoryProduct::class, 'product_category_id');
     }
}
