<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class BankAccounts extends Model
{
    use HasFactory;

    protected $table = "bank_accounts";

    protected $fillable = ['bank_name', 'account_name', 'account_number'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function depositions()
    {
        return $this->hasMany(Deposition::class,'bank_account_id');
    }
    public function withdraws()
    {
        return $this->hasMany(WithDraws::class,'bank_account_id');
    }
}
