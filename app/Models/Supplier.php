<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "product_suppliers";
    protected $fillable = ['supplier_name', 'supplier_location', 'supplier_phone_number'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
