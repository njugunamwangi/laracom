<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function cart(): View {
        $title = 'Shopping Cart';

        return view('components.home.cart', compact('title'));
    }

    public function checkout(): View {
        $title = 'Checkout';

        return view('components.home.checkout', compact('title'));
    }

    public function wishlist(): View {
        $title = 'Wishlist';

        return view('components.home.wishlist', compact('title'));
    }
}
