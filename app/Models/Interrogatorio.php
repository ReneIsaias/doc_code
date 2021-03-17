<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interrogatorio extends Model
{
    use HasFactory;

    protected $table = 'interrogatorios';

    protected $fillable = [
        'description',
        'status',
    ];

    /*Un interrogatorio le pertencen uno o muchos aparatos*/
    public function aparatos()
    {
        return $this->belongsToMany(Aparato::class)->withTimestamps();
    }

    /*Un interrogatorio le pertencen una o muchas consultas*/
    public function consultas()
    {
        return $this->belongsToMany(Consulta::class)->withTimestamps();
    }
}
