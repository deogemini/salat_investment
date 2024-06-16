<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatumiziInput extends Model
{
    use HasFactory;

    protected $table = "matumizi_inputs";

    protected $fillable = ['amount', 'matumizi_type_id'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function matumiziType(): BelongsTo{
        return $this->belongsTo(MatumiziType::class, 'matumizi_type_id');
    }
}
