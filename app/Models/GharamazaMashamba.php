<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GharamazaMashamba extends Model
{
    use HasFactory;

    protected $table = "gharama_mashamba";
    protected $fillable = ['mashamba_id', 'kusafisha_shamba', 'kulima_shamba', 'mbegu_za_shamba', 'kupanda_shamba', 'kupalilia_shamba','mifuko_ya_mbolea', 'gharama_za_mbolea','nauli_pikipiki','wafanyakazi', 'total'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function mashamba(): BelongsTo
    {
        return $this->belongsTo(Mashamba::class, 'mashamba_id');
    }
}
