<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $cart, $subTotal, $shipping = 1000;

    public function subTotal()
    {
        $this->cart = Cart::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        foreach ($this->cart as $item) {
            $this->subTotal += $item->product->retail_price * $item->quantity;
        }

        return $this->subTotal;
    }

    public function render()
    {
        $this->cart = Cart::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        $this->subTotal = $this->subTotal();

        return view('livewire.checkout', [
            'cart' => $this->cart,
            'subTotal' => $this->subTotal
        ]);
    }
}
