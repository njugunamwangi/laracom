<?php

namespace App\View\Components\Home;

use Closure;
use App\Models\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.checkout');
    }
}
