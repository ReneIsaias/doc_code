<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    use HasFactory;

    protected $table = 'escolaridades';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Una escolaridad pertence a un paciente */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
