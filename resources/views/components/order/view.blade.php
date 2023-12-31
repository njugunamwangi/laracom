<x-app-layout :title="$title">
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Order Summary</h2>
            </div>
            <!-- text - end -->

            <div class="bg-white">
                <div class="mx-auto max-w-3xl px-4 py-4 sm:px-6 sm:py-4 lg:px-8">
                    <div class="max-w-xl">
                        @if($order->order_status == 'Cancelled')
                            <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Order Cancelled</p>
                            <p class="mt-2 text-base text-gray-500">Your order #{{ $order->order_id }} was cancelled.</p>
                        @else
                            @if($order->order_status != 'Delivered')
                                <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">It's on the way!</p>
                                <p class="mt-2 text-base text-gray-500">Your order #{{ $order->order_id }} is being processed.</p>
                            @else
                                <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">All done here!</p>
                                <p class="mt-2 text-base text-gray-500">Your order #{{ $order->order_id }} has shipped and will be with you soon.</p>
                            @endif
                        @endif


                        <dl class="mt-12 text-sm font-medium">
                            <dt class="text-gray-900">Tracking number</dt>
                            <div class="flex justify-between">
                                <dd class="mt-2 text-indigo-600">{{ $order->tracking_no }}</dd>
                                <dd class="mt-2 flex">
                                    <x-order.order-status :status="$order->order_status" />
                                    <x-order.payment-status :status="$order->payment_status" />
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-10 border-t border-gray-200">
                        <h2 class="sr-only">Your order</h2>

                        <h3 class="sr-only">Items</h3>

                        @foreach($order->items as $item)
                            <x-order.order-item :item="$item" />
                        @endforeach


                        <div class="sm:ml-40 sm:pl-6">
                            <h3 class="sr-only">Your information</h3>

                            <h4 class="sr-only">Addresses</h4>
                            <dl class="grid grid-cols-2 gap-x-6 py-10 text-sm">
                                <div>
                                    <dt class="font-medium text-gray-900">Shipping address</dt>
                                    <dd class="mt-2 text-gray-700">
                                        <address class="not-italic">
                                            <span class="block">{{ $order->details->name }}</span>
                                            <span class="block">{{ $order->details->email }}</span>
                                            <span class="block">{{ $order->details->address1 .' '. $order->details->city }}</span>
                                            <span class="block">{{ $order->details->state .', '. $order->details->zipcode}}</span>
                                        </address>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-900">Billing address</dt>
                                    <dd class="mt-2 text-gray-700">
                                        <address class="not-italic">
                                            <span class="block">{{ $order->details->name }}</span>
                                            <span class="block">{{ $order->details->email }}</span>
                                            <span class="block">{{ $order->details->address1 .' '. $order->details->city }}</span>
                                            <span class="block">{{ $order->details->state .', '. $order->details->zipcode}}</span>
                                        </address>
                                    </dd>
                                </div>
                            </dl>

                            <h3 class="sr-only">Summary</h3>

                            <dl class="space-y-6 border-t border-gray-200 py-10 text-sm">
                                <div class="flex justify-between">
                                    <dt class="font-medium text-gray-900">Shipping</dt>
                                    <dd class="text-gray-700">Kes {{ number_format(1000, 2) }} </dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="font-medium text-gray-900">Total</dt>
                                    <dd class="text-gray-900">Kes {{ number_format($order->total_price, 2) }}</dd>
                                </div>
                            </dl>

                            @if($order->payment_status != 'Paid' && $order->order_status != 'Cancelled')

                                <h4 class="sr-only">Payment</h4>
                                <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 py-10 text-sm">
                                    <div>
                                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                            <div class="row" style="margin-bottom:40px;">
                                                <div class="col-md-8 col-md-offset-2">

                                                    <input type="hidden" name="email" value="{{ $order->details->email }}">
                                                    <input type="hidden" name="orderID" value="{{ $order->order_id }}">
                                                    <input type="hidden" name="amount" value="{{ $order->total_price * 100 }}">
                                                    <input type="hidden" name="currency" value="KES">
                                                    <input type="hidden" name="metadata" value="{{ json_encode($array = [
                                                        'user_id' => $order->user_id,
                                                        'order_id' => $order->id,]) }}" >
                                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <p>
                                                        <button class="inline-block flex-1 rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 sm:flex-none md:text-base" type="submit" value="Pay Now!">
                                                            <i class="fa fa-plus-circle fa-lg"></i> Pay with PayStack!
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </dl>

                            @endif


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
