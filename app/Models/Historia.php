<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;

    protected $fillable = [
        'noexpediente',
        'fecha',
        'edad',
        'sexo',
        'estadocivil',
        'domicilio',
        'ocupacion',
        'escolaridad',
        'estado',
    ];

    /* Una historia pertence a una historiales */
    public function historiale()
    {
        return $this->belongsTo(Historiale::class);
    }

}
