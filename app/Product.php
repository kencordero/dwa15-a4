<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function bags() {
        return $this->belongsToMany('App\Bag')->withTimestamps();
    }
}
