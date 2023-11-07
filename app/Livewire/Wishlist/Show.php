<?php

namespace App\Livewire\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $wishlist;


    public function render()
    {
        if (Auth::check()) {
            $this->wishlist = Wishlist::query()
                ->where('user_id', '=', auth()->user()->id)
                ->get();
        } else {
            $this->wishlist = null;
        }
        return view('livewire.wishlist.show', ['wishlist' => $this->wishlist]);
    }
}
