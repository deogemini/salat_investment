<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;


    public $table ="product_categories";

    protected $fillable = ['category_name', 'description'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
