<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{
    public Product $product;

    public function mount(Product $product) {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function addToCart(int $productId) {
        if (!Auth::check()) {
            session()->flash('message', 'Please login to proceed.');
        } else {

            if ($this->product->where('id', $productId)->where('status', 1)->exists()) {
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                    'quantity' => 1
                ]);
            } else {
                session()->flash('message', 'Product does not exist.');
            }
        }
    }
}
