<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamientos';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Un tratamiento le pertencen uno o muchos diagnosticos*/
    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class)->withTimestamps();
    }
}
