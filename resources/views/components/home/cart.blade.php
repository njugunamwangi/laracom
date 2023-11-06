<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-lg px-4 md:px-8">
            <div class="mb-6 sm:mb-10 lg:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Your Cart</h2>
            </div>

            <div class="mb-6 flex flex-col gap-4 sm:mb-8 md:gap-6">
                <!-- product - start -->
                <div class="flex flex-wrap gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
                    <a href="#" class="group relative block h-48 w-32 overflow-hidden bg-gray-100 sm:h-56 sm:w-40">
                        <img src="https://images.unsplash.com/photo-1612681621979-fffe5920dbe8?auto=format&q=75&fit=crop&w=200" loading="lazy" alt="Photo by Thái An" class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-1 flex-col justify-between py-4">
                        <div>
                            <a href="#" class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">Top</a>

                            <span class="block text-gray-500">Size: S</span>
                            <span class="block text-gray-500">Color: White</span>
                        </div>

                        <div>
                            <span class="mb-1 block font-bold text-gray-800 md:text-lg">$15.00</span>

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
                            <div class="flex h-12 w-20 overflow-hidden rounded border">
                                <input type="number" value="1" class="w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" />

                                <div class="flex flex-col divide-y border-l">
                                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">+</button>
                                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">-</button>
                                </div>
                            </div>

                            <button class="select-none text-sm font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Delete</button>
                        </div>

                        <div class="ml-4 pt-3 md:ml-8 md:pt-2 lg:ml-16">
                            <span class="block font-bold text-gray-800 md:text-lg">$15.00</span>
                        </div>
                    </div>
                </div>
                <!-- product - end -->

                <!-- product - start -->
                <div class="flex flex-wrap gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
                    <a href="#" class="group relative block h-48 w-32 overflow-hidden bg-gray-100 sm:h-56 sm:w-40">
                        <img src="https://images.unsplash.com/photo-1542327897-4141b355e20e?auto=format&q=75&fit=crop&w=200" loading="lazy" alt="Photo by Jessica Radanavong" class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-1 flex-col justify-between py-4">
                        <div>
                            <a href="#" class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">Jacket</a>

                            <span class="block text-gray-500">Size: M</span>
                            <span class="block text-gray-500">Color: Black</span>
                        </div>

                        <div>
                            <span class="mb-1 block font-bold text-gray-800 md:text-lg">$65.00</span>

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
                            <div class="flex h-12 w-20 overflow-hidden rounded border">
                                <input type="number" value="1" class="w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" />

                                <div class="flex flex-col divide-y border-l">
                                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">+</button>
                                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">-</button>
                                </div>
                            </div>

                            <button class="select-none text-sm font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Delete</button>
                        </div>

                        <div class="ml-4 pt-3 md:ml-8 md:pt-2 lg:ml-16">
                            <span class="block font-bold text-gray-800 md:text-lg">$65.00</span>
                        </div>
                    </div>
                </div>
                <!-- product - end -->

                <!-- product - start -->
                <div class="flex flex-wrap gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
                    <a href="#" class="group relative block h-48 w-32 overflow-hidden bg-gray-100 sm:h-56 sm:w-40">
                        <img src="https://images.unsplash.com/photo-1590926938512-c0d7e5c39abd?auto=format&q=75&fit=crop&w=200" loading="lazy" alt="Photo by vahid kanani" class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-1 flex-col justify-between py-4">
                        <div>
                            <a href="#" class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">Business suit</a>

                            <span class="block text-gray-500">Size: S</span>
                            <span class="block text-gray-500">Color: Black</span>
                        </div>

                        <div>
                            <span class="mb-1 block font-bold text-gray-800 md:text-lg">$49.99</span>

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
                            <div class="flex h-12 w-20 overflow-hidden rounded border">
                                <input type="number" value="1" class="w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" />

                                <div class="flex flex-col divide-y border-l">
                                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">+</button>
                                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">-</button>
                                </div>
                            </div>

                            <button class="select-none text-sm font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Delete</button>
                        </div>

                        <div class="ml-4 pt-3 md:ml-8 md:pt-2 lg:ml-16">
                            <span class="block font-bold text-gray-800 md:text-lg">$49.99</span>
                        </div>
                    </div>
                </div>
                <!-- product - end -->
            </div>

            <!-- totals - start -->
            <div class="flex flex-col items-end gap-4">
                <div class="w-full rounded-lg bg-gray-100 p-4 sm:max-w-xs">
                    <div class="space-y-1">
                        <div class="flex justify-between gap-4 text-gray-500">
                            <span>Subtotal</span>
                            <span>$129.99</span>
                        </div>

                        <div class="flex justify-between gap-4 text-gray-500">
                            <span>Shipping</span>
                            <span>$4.99</span>
                        </div>
                    </div>

                    <div class="mt-4 border-t pt-4">
                        <div class="flex items-start justify-between gap-4 text-gray-800">
                            <span class="text-lg font-bold">Total</span>

                            <span class="flex flex-col items-end">
              <span class="text-lg font-bold">$134.98 USD</span>
              <span class="text-sm text-gray-500">including VAT</span>
            </span>
                        </div>
                    </div>
                </div>

                <button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Check out</button>
            </div>
            <!-- totals - end -->
        </div>
    </div>
</x-app-layout>
