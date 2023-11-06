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
