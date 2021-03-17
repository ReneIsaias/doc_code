<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informante extends Model
{
    use HasFactory;

    protected $table = 'informantes';

    protected $fillable = [
        'name',
        'lastnames',
        'phone',
        'status',
        'parentesco_id',
    ];

    /* Un informante le pertencen uno o muchos pacientes*/
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class)->withTimestamps();
    }

    /* Un informante pertence a una parentesco */
    public function parentesco()
    {
        return $this->belongsTo(Parentesco::class);
    }
}
