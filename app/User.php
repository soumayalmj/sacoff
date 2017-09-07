<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'adresse', 'pin', 'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pin', 'token',
    ];

    protected $table = "users";

    /**
     * Get the emails of user.
     */
    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    /**
     * Get the pays that owns the user
     */
    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

    /**
     * Get the telUsers of user.
     */
    public function telUsers()
    {
        return $this->hasMany(TelUser::class);
    }
}
