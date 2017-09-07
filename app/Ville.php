<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = 'villes';

    public function Pays()
    {
        return $this->belongsToMany('App\Pays');
    }

    public function Utilisateurs()
    {
        return $this->hasMany('App\Utilisateur', "ville_id");
    }
}
