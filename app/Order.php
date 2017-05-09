<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['bag_id', 'payment_method', 'status', 'total_price'];

    public function bag() {
        return $this->belongsTo('App\Bag');
    }

    public static function createOrder($bag) {
        $totalPrice = 0;
        foreach ($bag->products as $product) {
            $totalPrice += $product->price * $product->pivot->quantity;
        }
        $order = Order::create([
            'bag_id' => $bag->id,
            'payment_method' => 'credit',
            'status' => 'placed',
            'total_price' => $totalPrice,
        ]);
    }
}
