<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddToWishlist extends Component
{

    public Product $product;

    public function render()
    {
        return view('livewire.add-to-wishlist');
    }

    public function addToWishlist()
    {

    }
}
