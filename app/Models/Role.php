<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    /* Un rol pertence a uno o muchos usuarios */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /* Un rol pertence a uno o muchos permisos */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
