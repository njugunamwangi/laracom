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

                $model = Cart::query()
                    ->where('user_id', '=', auth()->user()->id)
                    ->where('product_id', '=', $productId)
                    ->first();

                if (!$model) {

                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $productId,
                        'quantity' => 1
                    ]);
                    $this->dispatch('CartUpdated');
                } else {
                    session()->flash('message', 'Product already added to cart.');
                }
            } else {
                session()->flash('message', 'Product does not exist.');
            }
        }
    }
}
