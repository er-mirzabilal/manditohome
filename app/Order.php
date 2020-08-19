<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   Protected $fillable = ['customer_name', 'customer_contact', 'customer_address','delivery_area','delivery_fee','order_status','order_price','order_comment','paid_by_loyalty','loyalty_earned'];
    public function orderdetail(){
        return $this->hasMany('App\OrderDetail');
    }
}
