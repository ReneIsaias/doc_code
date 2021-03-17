<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    use HasFactory;

    protected $table = 'datos';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Un dato le pertencen uno o muchos tipos*/
    public function tipos()
    {
        return $this->belongsToMany(Tipo::class)->withTimestamps();
    }
    
    /* Un dato le pertencen una o muchas consultas*/
    public function consultas()
    {
        return $this->belongsToMany(Consulta::class)->withTimestamps();
    }
}
