<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historiale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'historia_id',
        'enfermedade_id',
        'unidade_id',
        'revisione_id',
    ];

    /* Una historiale pertence a un usuario */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Una historiale pertence a un historia */
    public function historia()
    {
        return $this->belongsTo(Historia::class);
    }

    /* Una historiale pertence a una enfermedad */
    public function enfermedade()
    {
        return $this->belongsTo(Enfermedade::class);
    }

    /* Una historiale pertence a una unidad */
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    /* Una historiale pertence a una revisione */
    public function revisione()
    {
        return $this->belongsTo(Revisione::class);
    }

}
