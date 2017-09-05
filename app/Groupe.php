<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public function Utilisateurs()
    {
        return $this->belongsToMany('App\Utilisateurs');
    }
}
