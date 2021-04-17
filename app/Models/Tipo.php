<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Un tipo pertence a uno o muchos datos */
    public function datos()
    {
        return $this->belongsToMany(Dato::class)->withTimestamps();
    }
}
