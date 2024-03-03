<?php

namespace App\View\Components\Home;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Collection extends Component
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
        $collections = Category::query()
            ->whereNull('parent_id')
            ->limit(3)
            ->get();

        return view('components.home.collection', compact('collections'));
    }
}
