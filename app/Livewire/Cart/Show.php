<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $cart;

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
