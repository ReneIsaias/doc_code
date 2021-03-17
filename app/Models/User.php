<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
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

    /* Un usuario pertence a uno o muchos eventos */
    public function events()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }

    /* Un usuario pertence a una o muchas roles */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /* Un usuario pertence a una o muchas permisos */
    public function permisos()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
