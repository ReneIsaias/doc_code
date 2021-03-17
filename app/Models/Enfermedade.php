<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedade extends Model
{
    use HasFactory;

    protected $table = 'enfermedades';

    protected $fillable = [
        'description',
        'other',
        'status',
    ];

    /* Una enfermedad le pertencen una o muchas consultas*/
    public function consultas()
    {
        return $this->belongsToMany(Consulta::class)->withTimestamps();
    }

    /* Una enfermedad le pertencen uno o muchos antecedentes*/
    public function antecedentes()
    {
        return $this->belongsToMany(Antecedente::class)->withTimestamps();
    }
}
