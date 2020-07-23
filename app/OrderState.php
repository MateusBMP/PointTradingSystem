<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the orders belonging to the order state
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
