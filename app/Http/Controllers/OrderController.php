<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    public function index(Request $request) {
        if (Auth::check()) {

            $user = $request->user()->id;

            $orders = Order::query()
                ->where('user_id', '=', $user)
                ->get();

            $title = "Orders";

            return view('components.order.index', compact('orders', 'title'));
        }


        return abort(403, 'Forbidden');
    }

    public function show(Order $order, Request $request) {
        if (Auth::check()) {

            $user = $request->user()->id;

            $title = $order->order_id;

            if ($order->user_id != $user) {
                return abort(403, 'You cannot view this order');
            }

            return view('components.order.view', compact('order', 'title'));
        }

        return abort(403, 'Forbidden');
    }
}
