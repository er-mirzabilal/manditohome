<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Protected $fillable = ['name', 'status'];

    public function product(){
        return $this->hasMany('App\Product');
    }
}
