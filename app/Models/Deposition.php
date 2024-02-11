<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposition extends Model
{
    use HasFactory;
    protected $table = "sales_deposition";
    protected $fillable = ['depositer_name', 'bank_name', 'account_number','account_name', 'amount', 'bank_account_id'];
    protected $guarded = ['id'];
    public $timestamps = true;



}
