<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Count extends Component
{
    public $orderCount;
    public function render()
    {
        $this->orderCount = $this->orderCount();

        return view('livewire.order.count', ['orderCount' => $this->orderCount]);
    }

    public function orderCount() {
        if(Auth::check()) {
            return $this->orderCount = Order::query()
                ->where('user_id', '=', auth()->user()->id)
                ->count();
        } else {
            return $this->orderCount = 0;
        }
    }
}
