<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $table = "groupes";

    /**
     * Get all of the users for the groupe.
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, GroupesUser::class);
    }
}
