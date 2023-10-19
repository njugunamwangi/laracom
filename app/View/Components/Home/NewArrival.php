<?php

namespace App\View\Components\Home;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewArrival extends Component
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
        $newArrivals = Product::query()
            ->where('status', '=', 1)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('components.home.new-arrival', compact('newArrivals'));
    }
}
