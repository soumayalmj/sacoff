<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelUser extends Model
{
    protected $table = "tel_user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobile', 'user_id', 'token',
    ];

    /**
     * Get the user that owns the teluser
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
