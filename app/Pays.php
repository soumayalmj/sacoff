<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = "pays";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'token',
    ];

    /**
     * Get the users of pays.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
