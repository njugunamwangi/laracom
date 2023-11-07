<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToWishlist extends Component
{
    public Product $product;

    public function mount(Product $product) {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.add-to-wishlist');
    }

    public function addToWishlist(int $productId)
    {
        if (!Auth::check()) {
            session()->flash('message', 'Please login to proceed.');
        } else {

            if ($this->product->where('id', $productId)->where('status', 1)->exists()) {

                $model = Wishlist::query()
                    ->where('user_id', '=', auth()->user()->id)
                    ->where('product_id', '=', $productId)
                    ->first();

                if (!$model) {

                    Wishlist::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $productId,
                    ]);
                    $this->dispatch('WishlistUpdated');
                } else {
                    session()->flash('message', 'Product already added to wishlist.');
                }
            } else {
                session()->flash('message', 'Product does not exist.');

            }
        }
    }
}
