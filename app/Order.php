<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['bag_id', 'user_id', 'payment_method', 'status', 'total_price'];

    public function bag() {
        return $this->belongsTo('App\Bag');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static function createOrder($bag) {


        $order = Order::create([
            'bag_id' => $bag->id,
            'user_id' => $bag->user_id,
            'payment_method' => 'credit',
            'status' => 'placed',
            'total_price' => $bag->getSubTotal(),
        ]);
    }
}
