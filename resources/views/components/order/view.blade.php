<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Order Summary</h2>
                <h2 class="mb-4 text-center text-xl font-light text-gray-800 md:mb-6 lg:text-3xl">Order ID: {{ $order->tracking_no }}</h2>
            </div>
            <!-- text - end -->

        </div>
    </div>
</x-app-layout>
