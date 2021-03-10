<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedade extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'estado',
    ];

    /* Una enfermedad pertence a una historiales */
    public function historiale()
    {
        return $this->belongsTo(Historiale::class);
    }
}
