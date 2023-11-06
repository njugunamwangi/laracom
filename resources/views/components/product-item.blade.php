<div>
    <a href="{{ route('product', $product) }}" class="group relative mb-2 block h-96 overflow-hidden rounded-lg bg-gray-100 shadow-lg lg:mb-3">
        <img
            src="{{ url('/storage/'.$product->productImage->path) }}"
            loading="lazy"
            alt="{{ $product->product }}"
            class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

        <div class="absolute left-0 bottom-2 flex gap-2">
            <span class="rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">{{ $product->getDiscount() }}</span>
            <span class="rounded-lg bg-white px-3 py-1.5 text-sm font-bold uppercase tracking-wider text-gray-800">New</span>
        </div>
    </a>

    <div class="flex items-start justify-between gap-2 px-2">
        <div class="flex flex-col">
            <a href="{{ route('product', $product) }}" class="text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">{{ $product->product }}</a>
            <span class="text-gray-500">by {{ $product->brand->brand }}</span>
        </div>

        <div class="flex flex-col items-end">
            <span class="font-bold text-gray-600 lg:text-lg">Kes {{ number_format($product->retail_price, 2) }}</span>
            <span class="text-sm text-red-500 line-through">Kes {{ number_format($product->list_price, 2) }}</span>
        </div>
    </div>
</div>
