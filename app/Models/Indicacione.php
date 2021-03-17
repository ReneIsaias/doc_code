<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacione extends Model
{
    use HasFactory;

    protected $table = 'indicaciones';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Una inidicacion le pertencen uno o muchos diagnosticos*/
    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class)->withTimestamps();
    }
}
