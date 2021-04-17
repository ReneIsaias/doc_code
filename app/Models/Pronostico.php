<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronostico extends Model
{
    use HasFactory;

    protected $table = 'pronosticos';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Un pronostico le pertencen uno o muchos diagnosticos*/
    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class)->withTimestamps();
    }
}
