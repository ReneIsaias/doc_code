<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory;

    protected $table = 'antecedentes';

    protected $fillable = [
        'description',
        'other',
        'status',
    ];

    /* Un antecedente le pertencen una o muchas enfermedades*/
    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedade::class)->withTimestamps();
    }

    /* Un antecedente le pertencen una o muchas consultas*/
    public function consultas()
    {
        return $this->belongsToMany(Consulta::class)->withTimestamps();
    }
}
