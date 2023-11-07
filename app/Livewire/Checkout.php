<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $cart, $subTotal = 0, $shipping = 1000;

    public $name, $email, $phone, $address1, $address2, $city, $state, $zipcode;

    public function rules()
    {
        return [
            'name' => 'required|string|max:2000',
            'email' => 'required|email|max:2000',
            'phone' => 'required|integer|min:10|max:12',
            'address1' => 'required|integer|min:3|max:6',
            'city' => 'required|string|max:20',
            'state' => 'required|string|max:20',
            'zipcode' => 'required|string|min:4|max:7',
        ];
    }

    public function placeOrder()
    {
        $validatedData = $this->validate();
    }

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
