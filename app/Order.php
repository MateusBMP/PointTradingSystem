<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the user who pay product.
     */
    public function payer()
    {
        return $this->belongsTo('App\User', 'payer_id');
    }

}
