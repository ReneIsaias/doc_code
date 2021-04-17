<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $table = 'especialidades';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Una especialidad pertence a un medico */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
