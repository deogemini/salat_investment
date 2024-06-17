<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matofali extends Model
{
    use HasFactory;

    protected $table = "tofalis";
    protected $fillable = ['bei_rejareja', 'idadi_matofali_stock'];
    public $timestamps = true;

    public function matofaliMMauzo(): HasMany
    {
        return $this->hasMany(Matofali::class, 'matofali_stock_id');

    }
}
