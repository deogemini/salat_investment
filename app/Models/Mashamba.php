<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mashamba extends Model
{
    use HasFactory;
    protected $table = "mashamba";
    protected $fillable = ['location', 'buying_cost', 'size', 'date_of_buying'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
