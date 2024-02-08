<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

    protected $table = "bank_accounts";

    protected $fillable = ['bank_name', 'account_name', 'account_number'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
