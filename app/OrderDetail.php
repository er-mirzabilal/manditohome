<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    Protected $fillable=['name', 'picture', 'sell_type', 'quant_step', 'price', 'order_id'];
    public function order()
    {
        return $this->belongsTo('App\Order','order_id');
    }
}
