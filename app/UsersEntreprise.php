<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersEntreprise extends Model
{
    protected $table = "users_entreprises";

    protected $fillable = [
         'nom', 'adresse', 'pay_country_id', 'token',
        ];
}
