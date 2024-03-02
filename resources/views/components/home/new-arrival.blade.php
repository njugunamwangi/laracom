<div id="new-arrival" class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">New Arrivals</h2>
        </div>
        <!-- text - end -->

        <div class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
            <!-- product - start -->
            @foreach($newArrivals as $product)
                <x-product-item :product="$product" />
            @endforeach
            <!-- product - end -->
        </div>
    </div>
</div>
