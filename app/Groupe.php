<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $table = "groupes_utilisateurs";

    public function Utilisateurs()
    {
        return $this->belongsToMany('App\Utilisateurs');
    }
}