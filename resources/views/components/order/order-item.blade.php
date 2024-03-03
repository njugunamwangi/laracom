
    <div class="flex space-x-6 border-b border-gray-200 py-10">
        <img src="{{ empty($item->product->image_id) ? "https://placehold.co/600x600?text=". $item->product->product  : url('/storage/' . $item->product->productImage->path) }}"
             alt="{{ $item->product->product }}"
             class="h-20 w-16 flex-none rounded-lg bg-gray-100 object-cover object-center sm:h-40 sm:w-40">

        <div class="flex flex-auto flex-col pl-2">
            <div>
                <h4 class="font-medium text-gray-900 hover:text-indigo-700">
                    <a href="{{ route('product', $item->product) }}">{{ $item->product->product }}</a>
                </h4>
            </div>
            <div class="mt-6 flex flex-1 items-end">
                <dl class="flex space-x-4 divide-x divide-gray-200 text-sm sm:space-x-6">
                    <div class="flex pr-4">
                        <dt class="text-gray-900 font-semibold">Quantity:</dt>
                        <dd class="ml-2 text-gray-700">{{ $item->quantity }}</dd>
                    </div>
                    <div class="flex px-4 sm:pl-6">
                        <dt class="text-gray-900 font-semibold">Unit Price:</dt>
                        <dd class="ml-2 text-gray-700">Kes {{ number_format($item->unit_price) }}</dd>
                    </div>

                    <div class="flex px-4 sm:pl-6 justify-end">
                        <dt class="text-gray-900 font-semibold">Sub Total:</dt>
                        <dd class="ml-2 text-gray-700">Kes {{ number_format($item->unit_price * $item->quantity) }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
