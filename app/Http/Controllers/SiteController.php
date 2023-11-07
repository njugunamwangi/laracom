<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function cart(): View {
        return view('components.home.cart');
    }

    public function checkout(): View {
        return view('components.home.checkout');
    }

    public function wishlist(): View {
        return view('components.home.wishlist');
    }
}
