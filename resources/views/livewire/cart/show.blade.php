<div>
    @if($cart && $cart->count() > 0)
        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
            <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                <div class="ml-3 flex h-full items-center">
                <button @click="cart = !cart" type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Close panel</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>
            </div>

            <div class="mt-8">
                <div class="flow-root">
                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                        @foreach($cart as $item)
                            <li class="flex py-6">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img
                                        src="{{ empty($item->product->image_id) ? "https://placehold.co/600x600?text=". $item->product->product  : url('/storage/' . $item->product->productImage->path) }}"
                                        alt="{{ $item->product->product }}"
                                        class="h-full w-full object-cover object-center">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a
                                                href="{{ route('product', $item->product) }}"
                                                wire:navigate>
                                                {{ $item->product->product }}
                                            </a>
                                        </h3>
                                        <!-- <p class="ml-4">Kes {{ number_format($item->product->retail_price, 2) }}</p> -->
                                        <p class="ml-4">
                                            Kes {{ number_format( $item->product->retail_price * $item->quantity, 2 ) }}
                                            @php $subTotal += $item->product->retail_price * $item->quantity @endphp
                                        </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">{{ $item->product->brand->brand }}</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500">Qty 1</p>

                                    <div class="flex">
                                        <button
                                            wire:loading.attr="disabled"
                                            wire:click="removeItem({{ $item->id }})"
                                            type="button"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">
                                            Remove
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
            <div class="flex justify-between text-base font-medium text-gray-900">
                <p>Subtotal</p>
                <p>Kes {{ number_format($subTotal, 2) }}</p>
            </div>
            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
            <div class="mt-6">
                <a
                    href="{{ route('checkout') }}"
                    wire:navigate
                    class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">
                    Checkout
                </a>
            </div>
            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                <p>
                    <button wire:click="clearCart" type="button" class="font-medium text-red-600 hover:text-indigo-500">
                        Clear cart
                    </button>
                    or
                    <button @click="cart = false" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Continue Shopping
                        <span aria-hidden="true"> &rarr;</span>
                    </button>
                </p>
            </div>
        </div>

    @else

        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
            <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                <div class="ml-3 flex h-full items-center">
                <button @click="cart = !cart" type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Close panel</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>
            </div>

            <div class="mt-8">
                <div class="flex justify-between text-base font-medium text-gray-900">
                    <h3>
                        Your cart is empty
                    </h3>
                </div>
            </div>
        </div>

    @endif

</div>
