<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
   public function user() {
       return $this->belongsTo('App\User');
   }

   public function products() {
       return $this->belongsToMany('App\Product')->withPivot('quantity');
   }
}
