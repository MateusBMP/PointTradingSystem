<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Get the orders made by the user
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'payer_id');
    }
}
