<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Una estado pertence a un paciente */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
