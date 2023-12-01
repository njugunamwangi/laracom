<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Order Summary</h2>
            </div>
            <!-- text - end -->

            <div class="bg-white">
                <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
                    <div class="max-w-xl">
                        <h1 class="text-base font-medium text-indigo-600">Thank you!</h1>
                        <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">It's on the way!</p>
                        <p class="mt-2 text-base text-gray-500">Your order #{{ $order->order_id }} has shipped and will be with you soon.</p>

                        <dl class="mt-12 text-sm font-medium">
                            <dt class="text-gray-900">Tracking number</dt>
                            <div class="flex justify-between">
                                <dd class="mt-2 text-indigo-600">{{ $order->tracking_no }}</dd>
                                <dd class="mt-2">
                                    <x-order.order-status :status="$order->order_status" />
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

                            <h4 class="sr-only">Payment</h4>
                            <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 py-10 text-sm">
                                <div>
                                    <dt class="font-medium text-gray-900">Payment method</dt>
                                    <dd class="mt-2 text-gray-700">
                                        <p>Apple Pay</p>
                                        <p>Mastercard</p>
                                        <p><span aria-hidden="true">••••</span><span class="sr-only">Ending in </span>1545</p>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-900">Shipping method</dt>
                                    <dd class="mt-2 text-gray-700">
                                        <p>DHL</p>
                                        <p>Takes up to 3 working days</p>
                                    </dd>
                                </div>
                            </dl>

                            <h3 class="sr-only">Summary</h3>

                            <dl class="space-y-6 border-t border-gray-200 pt-10 text-sm">
                                <div class="flex justify-between">
                                    <dt class="font-medium text-gray-900">Shipping</dt>
                                    <dd class="text-gray-700">Kes {{ number_format(1000, 2) }} </dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="font-medium text-gray-900">Total</dt>
                                    <dd class="text-gray-900">Kes {{ number_format($order->total_price, 2) }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
