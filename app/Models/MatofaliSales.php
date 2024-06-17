<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatofaliSales extends Model
{
    use HasFactory;

    protected $table = "tofali_sales";
    protected $fillable = ['matofali_stock_id', 'quantity', 'tota_cost'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function tofali(): BelongsTo{
        return $this->belongsTo(Matofali::class, 'matofali_stock_id');
    }
}
