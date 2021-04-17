<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacione extends Model
{
    use HasFactory;

    protected $table = 'postulaciones';

    protected $fillable = [
        'name',
        'lastnames',
        'email',
        'phone',
        'address',
        'description',
        'file',
    ];

}
