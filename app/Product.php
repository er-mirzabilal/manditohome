<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $fillable = ['name',  'picture', 'sell_type', 'quant_step', 'price', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }
}
