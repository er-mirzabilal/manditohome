<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    Protected $fillable=['setting_name','setting_value'];
}
