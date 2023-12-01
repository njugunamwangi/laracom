<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    public function show(Order $order, Request $request) {
        $user = $request->user()->id;

        if ($order->user_id != $user) {
            return abort(403, 'You cannot view this order');
        }

        return view('components.order.view', compact('order'));
    }
}
