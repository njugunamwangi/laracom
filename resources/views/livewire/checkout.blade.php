<div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-2 xl:grid-cols-2 xl:gap-8">
    @if($cart && $cart->count() == 0)
        No items in your cart
    @else
        <div class="flex flex-col items-center overflow-hidden rounded-lg border md:flex-row">
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <!-- text - start -->
                    <div class="mb-10 md:mb-16">
                        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Shipping Information</h2>
                    </div>
                    <!-- text - end -->

                    <!-- form - start -->
                    <div class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Name*</label>
                            <input wire:model="name"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('name')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Email*</label>
                            <input wire:model="email"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('email')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="phone" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Phone*</label>
                            <input wire:model="phone"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('phone')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div>
                            <label for="address1" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Address 1*</label>
                            <input wire:model="address1"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('address1')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div>
                            <label for="address2" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Address 2</label>
                            <input wire:model="address2"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('address2')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div>
                            <label for="city" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">City*</label>
                            <input wire:model="city"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('city')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div>
                            <label for="state" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">State*</label>
                            <input wire:model="state"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('state')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="zipcode" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Zip Code*</label>
                            <input wire:model="zipcode"
                                   class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                            @error('zipcode')
                                <p class="text-xs text-red-500 pt-1">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between sm:col-span-2">
                            <button
                                wire:click="placeOrder"
                                class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Place Order</button>

                            <span class="text-sm text-gray-500">*Required</span>
                        </div>
                    </div>
                    <!-- form - end -->
                </div>
            </div>
        </div>

        <div >

            @foreach($cart as $item)
                <div class="flex flex-wrap gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
                    <a href="{{ route('product', $item->product) }}"
                       class="group relative block h-24 w-16 overflow-hidden bg-gray-100 sm:h-56 sm:w-40">
                        <img src="{{ url('/storage/'.$item->product->productImage->path) }}"
                             loading="lazy"
                             alt="{{ $item->product->product }}"
                             class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-1 flex-col justify-between py-4">
                        <div>
                            <a href="{{ route('product', $item->product) }}"
                               class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">
                                {{ $item->product->product }}
                            </a>

                        </div>

                        <div>
                            Unit Price:
                            <span class="mb-1 block font-bold text-gray-800 md:text-lg">
                                Kes {{ number_format( $item->product->retail_price , 2 ) }}
                            </span>

                            <span class="flex items-center gap-1 text-sm text-gray-500">
                                Qty: {{ $item->quantity }}
                            </span>
                        </div>
                    </div>

                    <div class="flex w-full justify-between border-t p-2 sm:w-auto sm:border-none sm:pl-0 lg:p-6 lg:pl-0">
                        <div class="ml-4 md:ml-8 md:pt-1 lg:ml-16">
                            <span class="block font-bold text-gray-800 md:text-lg">
                                Kes {{ number_format( $item->product->retail_price * $item->quantity, 2 ) }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- totals - start -->
            <div class="flex flex-col items-end gap-4 pt-2">
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
            </div>
            <!-- totals - end -->
        </div>
    @endif
</div>
