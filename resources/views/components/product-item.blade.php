
<div>
    <div class="relative">
    <div class="relative h-72 w-full overflow-hidden rounded-lg">
        <img
            src="{{ empty($product->image_id) ? "https://placehold.co/600x600?text=". $product->product  : url('/storage/' . $product->productImage->path) }}"
            alt="{{ $product->product }}"
            class="h-full w-full object-cover object-center">
    </div>
    <div class="relative mt-4">
        <h3 class="text-sm font-medium text-gray-900">
            {{ $product->product }}
        </h3>
        <p class="mt-1 text-sm text-gray-500">{{ $product->brand->brand }}</p>
    </div>
    <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
        <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
        <p class="relative text-lg font-semibold text-white">
        Kes {{ number_format($product->retail_price, 2) }}
        </p>
    </div>
    </div>
    <div class="mt-6">
        <livewire:add-to-cart :product="$product" />
    </div>
</div>
