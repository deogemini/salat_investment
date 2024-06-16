<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class MatumiziType extends Model
{
    use HasFactory;

    protected $table = "matumizi_types";
    protected $fillable = ['name', 'description'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function matumizInputs(): HasMany
    {
        return $this->hasMany(MatumiziInput::class, 'matumizi_type_id');
    }
}
