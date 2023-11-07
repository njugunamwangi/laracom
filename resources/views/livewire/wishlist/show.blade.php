<div class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
    <!-- product - start -->
    @if($wishlist && $wishlist->count() > 0)
        @foreach($wishlist as $product)
            <x-product-item :product="$product->product" />
        @endforeach
    @else
        You have not added any products
    @endif

    <!-- product - end -->
</div>
