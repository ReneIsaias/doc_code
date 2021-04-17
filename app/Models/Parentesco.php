<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;

    protected $table = 'parentescos';

    protected $fillable = [
        'description',
        'status',
    ];

    /* Un parentesco pertence a un informante */
    public function informante()
    {
        return $this->belongsTo(Informante::class);
    }
}
