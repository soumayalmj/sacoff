<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";


    /**
     * Get the categoriesNotification that owns the notification
     */
    public function categoriesNotification()
    {
        return $this->belongsTo(CategoriesNotification::class, 'categorie_id');
    }
}
