<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aparato extends Model
{
    use HasFactory;

    protected $table = 'aparatos';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Un aparato le pertencen uno o muchos interrogatorios*/
    public function interrogatorios()
    {
        return $this->belongsToMany(Interrogatorio::class)->withTimestamps();
    }
}
