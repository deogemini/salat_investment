<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name', 'customer_email', 'amount',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->invoice_number = 'DBM' . str_pad(Invoice::max('id') + 1, 8, '0', STR_PAD_LEFT);
        });
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
