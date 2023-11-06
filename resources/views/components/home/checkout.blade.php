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
                    <a href="#" class="group relative block h-48 w-full shrink-0 self-start overflow-hidden bg-gray-100 md:h-full md:w-32 lg:w-48">
                        <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-col gap-2 p-4 lg:p-6">
                        <span class="text-sm text-gray-400">July 19, 2021</span>

                        <h2 class="text-xl font-bold text-gray-800">
                            <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">New trends in Tech</a>
                        </h2>

                        <p class="text-gray-500">This is a section of some simple filler text, also known as placeholder text.</p>

                        <div>
                            <a href="#" class="font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Read more</a>
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
