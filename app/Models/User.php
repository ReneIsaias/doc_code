<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellidos',
        'fechanacimiento',
        'telefono',
        'email',
        'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Un usuario pertence a una o muchas citas */
    public function citas()
    {
        return $this->belongsToMany(Cita::class)->withTimestamps();
    }

    /* Un usuario pertence a una o muchas roles */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /* Un usuario tiene muchas asignaciónes  */
    public function asignaciones()
    {
        return $this->hasMany(Asignapaciente::class);
    }

    /* Un usuario tiene muchas historias  */
    public function historias()
    {
        return $this->hasMany(Historiales::class);
    }
}
