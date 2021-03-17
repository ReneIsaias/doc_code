<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $table = 'diagnosticos';

    protected $fillable = [
        'description',
        'status',
    ];

     /* Un diagnostico le pertencen uno o muchos pronosticos*/
     public function pronosticos()
    {
        return $this->belongsToMany(Pronostico::class)->withTimestamps();
    }

    /* Un diagnostico le pertencen una o muchas indicaciones*/
    public function indicaciones()
    {
        return $this->belongsToMany(Indicacione::class)->withTimestamps();
    }

    /* Un diagnostico le pertencen uno o muchos comentarios*/
    public function comentarios()
    {
        return $this->belongsToMany(Comentario::class)->withTimestamps();
    }

    /* Un diagnostico le pertencen uno o muchos padecimientos*/
    public function padecimientos()
    {
        return $this->belongsToMany(Padecimiento::class)->withTimestamps();
    }

    /* Un diagnostico le pertencen uno o muchos medicos*/
    public function medicos()
    {
        return $this->belongsToMany(Medico::class)->withTimestamps();
    }

    /* Un diagnostico le pertencen uno o muchos tratamientos*/
    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class)->withTimestamps();
    }
}
