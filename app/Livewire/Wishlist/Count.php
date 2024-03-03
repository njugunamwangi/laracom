<?php

namespace App\Livewire\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Count extends Component
{
    public $wishlistCount;

    protected $listeners = ['WishlistUpdated' => 'wishlistCount'];

    public function wishlistCount()
    {
        if (Auth::check()) {
            return $this->wishlistCount = Wishlist::query()
                ->where('user_id', '=', auth()->user()->id)
                ->count();
        } else {
            return $this->wishlistCount = 0;
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->wishlistCount();

        return view('livewire.wishlist.count', ['wishlistCount' => $this->wishlistCount]);
    }
}
