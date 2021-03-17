<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'name',
        'lastnames',
        'phone',
        'address',
        'especialidade_id',
    ];

    /* Una medico le pertencen uno o muchos diagnosticos*/
    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class)->withTimestamps();
    }

    /*Una medico le pertencen una o muchas consultas*/
    public function consultas()
    {
        return $this->belongsToMany(Consulta::class)->withTimestamps();
    }

    /* Un medico pertence a una especialidad */
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
}
