<div>
    <div class="mb-6 flex flex-col gap-4 sm:mb-8 md:gap-6">

        @if($cart && $cart->count() > 0)
            @foreach($cart as $item)
                <!-- product - start -->
                <div class="flex flex-wrap gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
                    <a href="{{ route('product', $item->product) }}" wire:navigate
                       class="group relative block h-24 w-16 overflow-hidden bg-gray-100 sm:h-56 sm:w-40">
                        <img src="{{ url('/storage/'.$item->product->productImage->path) }}"
                             loading="lazy"
                             alt="{{ $item->product->product }}"
                             class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-1 flex-col justify-between py-4">
                        <div>
                            <a href="{{ route('product', $item->product) }}" wire:navigate
                               class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">
                                {{ $item->product->product }}
                            </a>

                        </div>

                        <div>
                            <span class="mb-1 block font-bold text-gray-800 md:text-lg">Kes {{ number_format( $item->product->retail_price , 2 ) }}</span>

                            <span class="flex items-center gap-1 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>

                                In stock
                            </span>
                        </div>
                    </div>

                    <div class="flex w-full justify-between border-t p-4 sm:w-auto sm:border-none sm:pl-0 lg:p-6 lg:pl-0">
                        <div class="flex flex-col items-start gap-2">
                            <div class="flex h-12 w-24 overflow-hidden rounded border">
                                <input
                                    type="number"
                                    value="{{ $item->quantity }}"
                                    disabled
                                    class="w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" />

                                <div class="flex flex-col divide-y border-l">
                                    <button wire:click="incrementQuantity({{ $item->id }})"
                                            wire:loading.attr="disabled"
                                            class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">+</button>
                                    <button wire:click="decrementQuantity({{ $item->id }})"
                                            wire:loading.attr="disabled"
                                            class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">-</button>
                                </div>
                            </div>

                            <button wire:loading.attr="disabled"
                                    wire:click="removeItem({{ $item->id }})"
                                class="select-none text-sm font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">
                                <span wire:loading.remove wire:target="removeItem({{ $item->id }})">
                                    Delete
                                </span>
                                <span wire:loading wire:target="removeItem({{ $item->id }})">
                                    Delete
                                </span>
                            </button>
                        </div>

                        <div class="ml-4 pt-3 md:ml-8 md:pt-2 lg:ml-16">
                            <span class="block font-bold text-gray-800 md:text-lg">
                                Kes {{ number_format( $item->product->retail_price * $item->quantity, 2 ) }}
                                @php $subTotal += $item->product->retail_price * $item->quantity @endphp
                            </span>
                        </div>
                    </div>
                </div>
                <!-- product - end -->

            @endforeach

            <!-- totals - start -->
            <div class="flex flex-col items-end gap-4">
                <div class="w-full rounded-lg bg-gray-100 p-4 sm:max-w-xs">
                    <div class="space-y-1">
                        <div class="flex justify-between gap-4 text-gray-500">
                            <span>Subtotal</span>
                            <span>Kes {{ number_format($subTotal, 2) }}</span>
                        </div>

                        <div class="flex justify-between gap-4 text-gray-500">
                            <span>Shipping</span>
                            <span>Kes {{ number_format($shipping, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-4 border-t pt-4">
                        <div class="flex items-start justify-between gap-4 text-gray-800">
                            <span class="text-lg font-bold">Total</span>

                            <span class="flex flex-col items-end">
                            <span class="text-lg font-bold">Kes {{ number_format($subTotal + $shipping, 2) }}</span>
                            <span class="text-sm text-gray-500">including VAT</span>
                        </span>
                        </div>
                    </div>
                </div>

                <a
                    href="{{ route('checkout') }}"
                    class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">
                    Check out
                </a>
            </div>
            <!-- totals - end -->

        @else
            <div>Your cart is empty</div>
        @endif


    </div>


</div>
