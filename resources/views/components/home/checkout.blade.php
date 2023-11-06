<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Checkout</h2>
            </div>
            <!-- text - end -->

            <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-2 xl:grid-cols-2 xl:gap-8">
                <!-- article - start -->
                <div class="flex flex-col items-center overflow-hidden rounded-lg border md:flex-row">
                    <div class="bg-white py-6 sm:py-8 lg:py-12">
                        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                            <!-- text - start -->
                            <div class="mb-10 md:mb-16">
                                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Information</h2>
                            </div>
                            <!-- text - end -->

                            <!-- form - start -->
                            <form class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="first-name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">First name*</label>
                                    <input name="first-name" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                                </div>

                                <div>
                                    <label for="last-name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Last name*</label>
                                    <input name="last-name" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="email" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Email*</label>
                                    <input name="email" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                                </div>

                                <div class="flex items-center justify-between sm:col-span-2">
                                    <button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Send</button>

                                    <span class="text-sm text-gray-500">*Required</span>
                                </div>

                                <p class="text-xs text-gray-400">By signing up to our newsletter you agree to our <a href="#" class="underline transition duration-100 hover:text-indigo-500 active:text-indigo-600">Privacy Policy</a>.</p>
                            </form>
                            <!-- form - end -->
                        </div>
                    </div>
                </div>
                <!-- article - end -->

                <!-- article - start -->
                <livewire:checkout />
                <!-- article - end -->
            </div>
        </div>
    </div>
</x-app-layout>
