<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = "utilisateurs";
    public function statutUtilisateur()
    {
        return $this->hasOne('App\StatutUtilisateur');
    }
}
