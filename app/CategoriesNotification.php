<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesNotification extends Model
{
    protected $table = "categories_notif";

    /**
     * Get the notifications of categoriesnotification.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'categorie_id');
    }
}
