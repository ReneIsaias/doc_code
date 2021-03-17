<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'name',
        'lastnames',
        'age',
        'birthday',
        'sexo',
        'address',
        'escolaridade_id',
        'ocupacione_id',
        'estado_id',
        'grupo_id',
    ];

    /* Un paciente pertence a una escolaridad */
    public function escolaridade()
    {
        return $this->belongsTo(Escolaridade::class);
    }

    /* Un paciente pertence a un estado */
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    /* Un paciente pertence a una grupo */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    /* Un paciente pertence a una ocupacion*/
    public function ocupacione()
    {
        return $this->belongsTo(Ocupacione::class);
    }

    /*Una paciente le pertencen una o muchas consultas*/
    public function consultas()
    {
        return $this->belongsToMany(Consulta::class)->withTimestamps();
    }

    /*Una paciente le pertencen uno o muchos informantes*/
    public function informantes()
    {
        return $this->belongsToMany(Informante::class)->withTimestamps();
    }
}
