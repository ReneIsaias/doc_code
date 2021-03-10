<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisione extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnostico',
        'indicaciones',
        'pronostico',
        'tratamiento',
    ];

    /* Una revision pertence a una historiales */
    public function historiale()
    {
        return $this->belongsTo(Historiale::class);
    }
}
