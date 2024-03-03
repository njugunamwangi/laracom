<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Livewire\Component;

class Checkout extends Component
{
    public $cart;

    public $subTotal;

    public $shipping = 0;

    public $name;

    public $email;

    public $phone;

    public $address1;

    public $address2;

    public $city;

    public $state;

    public $zipcode;

    public function rules()
    {
        return [
            'name' => 'required|string|max:2000',
            'email' => 'required|email|max:2000',
            'phone' => 'required|string|min:10|max:12',
            'address1' => 'required|string|min:3|max:6',
            'city' => 'required|string|max:20',
            'state' => 'required|string|max:20',
            'zipcode' => 'required|string|min:4|max:7',
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $total = $this->shipping;

        foreach ($this->cart as $item) {
            $total += $item->product->retail_price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'total_price' => $total,
            'tracking_no' => Str::uuid(),
            'order_id' => 'AXFYT-'.rand(1000000, 9999999),
            'payment_method' => 'Online',
            'payment_status' => 'Not Paid',
            'order_status' => 'Pending',
        ]);

        foreach ($this->cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->product->retail_price,
            ]);
        }

        $orderDetails = OrderDetail::create([
            'order_id' => $order->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
        ]);

        if ($order && $orderDetails) {
            Cart::query()->where('user_id', '=', auth()->user()->id)->delete();

            return redirect()->to('/order/'.$order->tracking_no);
        }
    }

    public function render()
    {
        $this->cart = Cart::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        return view('livewire.checkout', [
            'cart' => $this->cart,
        ]);
    }
}
