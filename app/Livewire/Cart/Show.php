<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Show extends Component
{
    public $cart;

    public $subTotal = 0;

    public $shipping = 0;

    protected $listeners = ['CartUpdated' => 'cart'];

    public function incrementQuantity(int $cartId)
    {
        $model = Cart::query()
            ->where('id', '=', $cartId)
            ->where('user_id', '=', auth()->user()->id)
            ->first();

        if ($model) {

            $model->increment('quantity');
            Toaster::success('Cart updated');

        }
    }

    public function decrementQuantity(int $cartId)
    {
        $model = Cart::query()
            ->where('id', '=', $cartId)
            ->where('user_id', '=', auth()->user()->id)
            ->first();

        if ($model && $model->quantity > 1) {

            $model->decrement('quantity');
            Toaster::success('Cart updated');

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
            Toaster::error('Product removed from cart.');
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
            'cart' => $this->cart,
        ]);
    }
}
