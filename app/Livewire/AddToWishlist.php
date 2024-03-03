<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AddToWishlist extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.add-to-wishlist');
    }

    public function addToWishlist(int $productId)
    {
        if (! Auth::check()) {
            Toaster::info('Please login to proceed.');
        } else {

            if ($this->product->where('id', $productId)->where('status', 1)->exists()) {

                $model = Wishlist::query()
                    ->where('user_id', '=', auth()->user()->id)
                    ->where('product_id', '=', $productId)
                    ->first();

                if (! $model) {

                    Wishlist::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $productId,
                    ]);
                    $this->dispatch('WishlistUpdated');

                    Toaster::success('Product added to wishlist.');
                } else {
                    Toaster::warning('Product already added to wishlist.');
                }
            } else {
                Toaster::danger('Product does not exist.');

            }
        }
    }
}
