<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the user who transferred the points.
     */
    public function from_user()
    {
        return $this->belongsTo('App\User', 'from_user_id');
    }

    /**
     * Get the user who received the points.
     */
    public function receive_user()
    {
        return $this->belongsTo('App\User', 'receive_user_id');
    }
}
