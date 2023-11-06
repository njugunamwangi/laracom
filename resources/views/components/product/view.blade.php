<x-app-layout>

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-lg px-4 md:px-8">
            <div class="grid gap-8 md:grid-cols-2">
                <div class="space-y-4">
                    <div class="relative overflow-hidden rounded-lg bg-gray-100">
                        <img
                            src="{{ url('/storage/'.$product->productImage->path) }}"
                            loading="lazy" alt="{{ $product->product }}"
                            class="h-full w-full object-cover object-center"/>

                        <span
                            class="absolute left-0 top-0 rounded-br-lg bg-red-500 px-3 py-1.5 text-sm uppercase tracking-wider text-white">{{ $product->getDiscount() }}</span>
                    </div>
                </div>

                <div class="md:py-8">
                    <div class="mb-2 md:mb-3">
                        <span class="mb-0.5 inline-block text-gray-500">{{ $product->brand->brand }}</span>
                        <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">{{ $product->product }}</h2>
                    </div>

                    <div class="mb-6 flex items-center md:mb-10">
                        <div class="-ml-1 flex gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>

                        <span class="ml-2 text-sm text-gray-500">4.2</span>

                        <a href="#"
                           class="ml-4 text-sm font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">view
                            all 47 reviews</a>
                    </div>

                    <div class="mb-4">
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-gray-800 md:text-2xl">
                                Kes {{ number_format($product->retail_price, 2) }}
                            </span>
                            <span class="mb-0.5 text-red-500 line-through">
                                Kes {{ number_format($product->list_price, 2) }}
                            </span>
                        </div>

                        <span class="text-sm text-gray-500">incl. VAT plus shipping</span>
                    </div>

                    <div class="mb-6 flex items-center gap-2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>

                        <span class="text-sm">2-4 day shipping</span>
                    </div>

                    <!-- buttons - start -->
                    <div class="flex gap-2.5">
                        <livewire:add-to-cart :product='$product' />

                        <livewire:wishlist :product='$product'/>
                    </div>
                    <!-- buttons - end -->
                </div>
            </div>
            <div>
                <div class="mt-10 md:mt-16 lg:mt-20">
                    <div class="mb-3 text-lg font-semibold text-gray-800">Description</div>

                    <p class="text-gray-500">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
