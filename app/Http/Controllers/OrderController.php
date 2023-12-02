<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    public function show(Order $order, Request $request) {
        if (Auth::check()) {

            $user = $request->user()->id;

            if ($order->user_id != $user) {
                return abort(403, 'You cannot view this order');
            }

            return view('components.order.view', compact('order'));
        }

        return abort(403, 'Forbidden');
    }
}
