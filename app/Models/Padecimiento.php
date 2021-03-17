<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padecimiento extends Model
{
    use HasFactory;

    protected $table = 'padecimientos';

    protected $fillable = [
        'description',
        'status',
    ];

    /*Un padecimiento le pertencen uno o muchos diagnosticos*/
    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class)->withTimestamps();
    }

    /*Un padecimiento le pertencen uno o muchos consultas*/
    public function consultas()
    {
        return $this->belongsToMany(Consulta::class)->withTimestamps();
    }
}
