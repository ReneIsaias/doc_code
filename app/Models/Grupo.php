<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Un grupo pertence a un paciente */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
