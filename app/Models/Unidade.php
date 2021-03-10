<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfc',
        'nombre',
        'descripcion',
        'municipio',
        'colonia',
        'codigo',
        'direccion',
        'estado',
    ];

    /* Una unidad pertence a una historiales */
    public function historiale()
    {
        return $this->belongsTo(Historiale::class);
    }
}
