<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatumiziCement extends Model
{
    use HasFactory;


    protected $table = "matumizi_cements";
    protected $fillable = ['jina_cement','buying_price', 'quantity_in', 'total_cost'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
