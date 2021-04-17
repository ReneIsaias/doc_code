<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupacione extends Model
{
    use HasFactory;

    protected $table = 'ocupaciones';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Una ocupación pertence a un paciente */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
