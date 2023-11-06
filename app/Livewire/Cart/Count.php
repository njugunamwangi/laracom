<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Count extends Component
{
    public $cartCount;

    protected $listeners = ['CartUpdated' => 'cartCount'];

    public function cartCount()
    {
        if (Auth::check()) {
            return $this->cartCount = Cart::query()
                ->where('user_id', '=', auth()->user()->id)
                ->count();
        } else {
            return $this->cartCount = 0;
        }
    }

    public function render()
    {
        $this->cartCount = $this->cartCount();

        return view('livewire.cart.count', ['cartCount' => $this->cartCount]);
    }
}
