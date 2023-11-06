<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $cart, $subTotal = 0, $shipping = 1000;

    public function render()
    {
        $this->cart = Cart::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        return view('livewire.checkout', [
            'cart' => $this->cart
        ]);
    }
}
