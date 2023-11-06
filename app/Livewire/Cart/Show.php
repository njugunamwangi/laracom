<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $cart;

    public function incrementQuantity(int $cartId)
    {
        $model = Cart::query()
            ->where('id', '=', $cartId)
            ->where('user_id', '=', auth()->user()->id)
            ->first();

        if ($model) {

            $model->increment('quantity');

        }
    }

    public function decrementQuantity(int $cartId)
    {
        $model = Cart::query()
            ->where('id', '=', $cartId)
            ->where('user_id', '=', auth()->user()->id)
            ->first();

        if ($model) {

            $model->decrement('quantity');

        }
    }

    public function removeItem(int $cartId)
    {
        $model = Cart::query()
            ->where('id', '=', $cartId)
            ->where('user_id', '=', auth()->user()->id)
            ->first();

        if ($model) {
            $model->delete();
            $this->dispatch('CartUpdated');
        }
    }

    public function render()
    {
        if (Auth::check()) {
            $this->cart = Cart::query()
                ->where('user_id', '=', auth()->user()->id)
                ->get();
        } else {
            $this->cart = null;
        }

        return view('livewire.cart.show', [
            'cart' => $this->cart
        ]);
    }
}
