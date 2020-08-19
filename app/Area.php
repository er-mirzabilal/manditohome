<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    Protected $fillable = ['name','shipping_price','available'];
}
