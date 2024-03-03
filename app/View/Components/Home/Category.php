<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
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
        $categories = \App\Models\Category::query()
            ->whereNotNull('parent_id')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('components.home.category', compact('categories'));
    }
}
