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

    public function getOrCreateCart() {
        return Bag::getOrCreateBagType('cart');
    }

    public function getOrCreateWishList() {
        return Bag::getOrCreateBagType('wishlist');
    }

    private function getOrCreateBagType($bagType) {
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
