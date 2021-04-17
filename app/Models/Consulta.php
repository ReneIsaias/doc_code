<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'folio',
        'date',
        'description',
        'status',
    ];

    /* Una consulta le pertencen una o muchas unidades*/
    public function unidades()
    {
        return $this->belongsToMany(Unidade::class)->withTimestamps();
    }

    /* Una consulta le pertencen uno o muchos interrogatorios*/
    public function interrogatorios()
    {
        return $this->belongsToMany(Interrogatorio::class)->withTimestamps();
    }

    /* Una consulta le pertencen uno o muchos datos*/
    public function datos()
    {
        return $this->belongsToMany(Dato::class)->withTimestamps();
    }

    /* Una consulta le pertencen uno o muchos antecedentes*/
    public function antecedentes()
    {
        return $this->belongsToMany(Antecedente::class)->withTimestamps();
    }

    /* Una consulta le pertencen una o muchas enfermedades*/
    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedade::class)->withTimestamps();
    }

    /* Una consulta le pertencen uno o muchos padecimientos*/
    public function padecimientos()
    {
        return $this->belongsToMany(Padecimiento::class)->withTimestamps();
    }

    /* Una consulta le pertencen uno o muchos medicos*/
    public function medicos()
    {
        return $this->belongsToMany(Medico::class)->withTimestamps();
    }

    /* Una consulta le pertencen uno o muchos pacientes*/
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class)->withTimestamps();
    }
}
