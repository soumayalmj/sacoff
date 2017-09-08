<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayCountry extends Model
{
    protected $table = "pay_country";
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
