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

    public function products() {
        return $this->belongsToMany('App\Product')->withPivot('quantity')->withTimestamps();
    }

    public static function getOrCreateCart() {
        return Bag::getOrCreateBagType('cart');
    }

    public static function getOrCreateWishList() {
        return Bag::getOrCreateBagType('wishlist');
    }

    public function addToBag($productId) {
        $productIdsInCart = array_pluck($this->products->toArray(), 'id');

        if (in_array($productId, $productIdsInCart)) {
            if ($this->type == 'cart') {
                $quantity = $this->products->where('id', '=', $productId)->first()->pivot->quantity;
                $this->products()->updateExistingPivot($productId, ['quantity' => $quantity + 1,]);
                $this->save;
            }
        } else {
            $this->products()->attach($productId, ['quantity' => 1,]);
        }
    }

    private static function getOrCreateBagType($bagType) {
        $bag = Bag::where('type', '=', $bagType)
            ->where('user_id', '=', Auth::id())
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
