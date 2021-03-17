<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidades';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Una unidad pertence a una o muchas consultas */
    public function consultas()
    {
        return $this->belongsTo(Consulta::class);
    }
}
