<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = "emails_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'token',
    ];

    /**
     * Get the user that owns the email
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
