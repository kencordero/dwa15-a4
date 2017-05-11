<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bag extends Model
{
    protected $fillable = ['type', 'user_id'];

    public function user() {
       return $this->belongsTo('App\User');
    }

    public function order() {
        return $this->hasOne('App\Order');
    }

    public function products() {
        return $this->belongsToMany('App\Product')->withPivot('quantity')->withTimestamps();
    }

    public static function getOrCreateCart() {
        return Bag::getOrCreateBagType('cart');
    }

    public static function getOrCreateWishlist() {
        return Bag::getOrCreateBagType('wishlist');
    }

    public function addToBag($productId) {
        if (in_array($productId, $this->getProductIds())) {
            if ($this->type == 'cart') {
                $quantity = $this->products->where('id', $productId)->first()->pivot->quantity;
                $this->products()->updateExistingPivot($productId, ['quantity' => $quantity + 1,]);
                $this->save;
            }
        } else {
            $this->products()->attach($productId, ['quantity' => 1,]);
        }
    }

    public function decrementQuantity($productId) {
        if (in_array($productId, $this->getProductIds())) {
            $quantity = $this->products->where('id', $productId)->first()->pivot->quantity;
            if ($quantity > 1) {
                $this->products()->updateExistingPivot($productId, ['quantity' => $quantity - 1]);
            } else {
                $this->removeFromBag($productId);
            }
        }
    }

    public function removeFromBag($productId) {
        if (in_array($productId, $this->getProductIds())) {
            $this->products()->detach($productId);
        }
    }

    private function getProductIds() {
        return array_pluck($this->products->toArray(), 'id');
    }

    public static function placeOrder() {
        $bag = Bag::getOrCreateCart();
        if ($bag->products->count() > 0) {
            $bag->type = 'order';
            $bag->save();

            Order::createOrder($bag);
        }
        return $bag;
    }

    public function getSubTotal() {
        $subtotal = 0;
        foreach ($this->products as $product) {
            $subtotal += $product->price * $product->pivot->quantity;
        }
        return $subtotal;
    }

    private static function getOrCreateBagType($bagType) {
        $bag = Bag::where('type', $bagType)
            ->where('user_id', Auth::id())
            ->with('products')->first();

        if (is_null($bag)) {
            $bag = Bag::create([
                'type' => $bagType,
                'user_id' => Auth::id(),
            ]);
        }

        return $bag;
    }
}
