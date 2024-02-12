<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithDraws extends Model
{
    use HasFactory;
    protected $table = "withdraws";
    protected $fillable = ['withdrawer_name', 'bank_account_id', 'amount'];
    protected $guarded = ['id'];
    public $timestamps = true;


    public function bankAccount()
    {
        return $this->belongsTo(BankAccounts::class, 'bank_account_id');
    }
}
