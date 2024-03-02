<div x-data="{ category: {}, mobile: false }">
    <div x-show="mobile" x-cloak @click.away="mobile = false" class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <!--
        Off-canvas menu backdrop, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">
        <!--
            Off-canvas menu, show/hide based on off-canvas menu state.

            Entering: "transition ease-in-out duration-300 transform"
            From: "-translate-x-full"
            To: "translate-x-0"
            Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "-translate-x-full"
        -->
        <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
            <div class="flex px-4 pb-2 pt-5">
            <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            </div>

            <!-- Links -->
            <div class="mt-2">
            <div class="border-b border-gray-200">
                <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
                <button id="tabs-1-tab-1" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>
                <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
                <button id="tabs-1-tab-2" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
                </div>
            </div>

            <!-- 'Women' tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-1" class="space-y-12 px-4 py-6" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    New Arrivals
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Basic Tees
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg" alt="Model wearing minimalist watch with black wristband and white watch face." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Accessories
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg" alt="Model opening tan leather long wallet with credit card pockets and cash pouch." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Carry
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                </div>
            </div>
            <!-- 'Men' tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-2" class="space-y-12 px-4 py-6" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg" alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    New Arrivals
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg" alt="Model wearing light heather gray t-shirt." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Basic Tees
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg" alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Accessories
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg" alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching." class="object-cover object-center">
                    </div>
                    <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                    Carry
                    </a>
                    <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                </div>
                </div>
            </div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
            <div class="flow-root">
                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
            </div>
            <div class="flow-root">
                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
            </div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
            <div class="flow-root">
                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
            </div>
            <div class="flow-root">
                <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
            </div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
            <!-- Currency selector -->
            <form>
                <div class="inline-block">
                <label for="mobile-currency" class="sr-only">Currency</label>
                <div class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
                    <select id="mobile-currency" name="currency" class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
                    <option>CAD</option>
                    <option>USD</option>
                    <option>AUD</option>
                    <option>EUR</option>
                    <option>GBP</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </div>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Hero section -->
    <div class="relative bg-gray-900">
        <!-- Decorative image and overlay -->
        <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
        <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-hero-full-width.jpg" alt="" class="h-full w-full object-cover object-center">
        </div>
        <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>

        <!-- Navigation -->
        <header class="relative z-10">
            <nav aria-label="Top">
                <!-- Top navigation -->
                <div class="bg-gray-900">
                <div class="mx-auto flex h-10 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                    <!-- Currency selector -->
                    <form>
                    <div>
                        <label for="desktop-currency" class="sr-only">Currency</label>
                        <div class="group relative -ml-2 rounded-md border-transparent bg-gray-900 focus-within:ring-2 focus-within:ring-white">
                        <select id="desktop-currency" name="currency" class="flex items-center rounded-md border-transparent bg-gray-900 bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-white focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-100">
                            <option>CAD</option>
                            <option>USD</option>
                            <option>AUD</option>
                            <option>EUR</option>
                            <option>GBP</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                            <svg class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        </div>
                    </div>
                    </form>

                    <div class="flex items-center space-x-6">
                    <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Sign in</a>
                    <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Create an account</a>
                    </div>
                </div>
                </div>

                <!-- Secondary navigation -->
                <div class="bg-white bg-opacity-10 backdrop-blur-md backdrop-filter">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div>
                    <div class="flex h-16 items-center justify-between">
                        <!-- Logo (lg+) -->
                        <div class="hidden lg:flex lg:flex-1 lg:items-center">
                        <a href="#">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="">
                        </a>
                        </div>

                        <div class="hidden h-full lg:flex">
                        <!-- Flyout menus -->
                        <div class="inset-x-0 bottom-0 px-4">
                            <div class="flex h-full justify-center space-x-8">
                                @foreach($categories as $category)
                                    <div class="flex">
                                        <div class="relative flex">
                                        <button @click="category['{{ $category->id }}'] = !category['{{ $category->id }}']" type="button" class="relative z-10 flex items-center justify-center text-sm font-medium text-white transition-colors duration-200 ease-out" aria-expanded="false">
                                            {{ $category->category }}
                                            <!-- Open: "bg-white", Closed: "" -->
                                            <span class="absolute inset-x-0 -bottom-px h-0.5 transition duration-200 ease-out" aria-hidden="true"></span>
                                        </button>
                                        </div>

                                        <!--
                                        flyout menu, show/hide based on flyout menu state.

                                        Entering: "transition ease-out duration-200"
                                            From: "opacity-0"
                                            To: "opacity-100"
                                        Leaving: "transition ease-in duration-150"
                                            From: "opacity-100"
                                            To: "opacity-0"
                                        -->
                                        <div class="absolute inset-x-0 top-full text-sm text-gray-500">
                                        <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                        <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                                        <div class="relative bg-white" x-cloak x-show="category['{{ $category->id }}']" @click.away="category['{{ $category->id }}'] = false" >
                                            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                                <div class="grid grid-cols-4 gap-x-8 gap-y-10 py-16">
                                                    @foreach($category->children()->get() as $subCategory)
                                                        <div class="group relative">
                                                            <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                                                <img
                                                                    src="{{ empty($subCategory->image_id) ? "https://placehold.co/600x400?text=". $subCategory->category  : url('/storage/' . $subCategory->image->path) }}"
                                                                    alt="{{ $subCategory->category }}"
                                                                    class="object-cover object-center">
                                                            </div>
                                                            <a href="#" class="mt-4 block font-medium text-gray-900">
                                                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                                                {{ $subCategory->category }}
                                                            </a>
                                                            <p aria-hidden="true" class="mt-1">Shop now</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        </div>

                        <!-- Mobile menu and search (lg-) -->
                        <div class="flex flex-1 items-center lg:hidden">
                        <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                        <button type="button" class="-ml-2 p-2 text-white">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                        <!-- Search -->
                        <a href="#" class="ml-2 p-2 text-white">
                            <span class="sr-only">Search</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </a>
                        </div>

                        <!-- Logo (lg-) -->
                        <a href="#" class="lg:hidden">
                        <span class="sr-only">Your Company</span>
                        <img src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="" class="h-8 w-auto">
                        </a>

                        <div class="flex flex-1 items-center justify-end">
                        <a href="#" class="hidden text-sm font-medium text-white lg:block">Search</a>

                        <div class="flex items-center lg:ml-8">
                            <!-- Help -->
                            <a href="#" class="p-2 text-white lg:hidden">
                            <span class="sr-only">Help</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                            </svg>
                            </a>
                            <a href="#" class="hidden text-sm font-medium text-white lg:block">Help</a>

                            <!-- Cart -->
                            <div class="ml-4 flow-root lg:ml-8">
                            <a href="#" class="group -m-2 flex items-center p-2">
                                <svg class="h-6 w-6 flex-shrink-0 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <span class="ml-2 text-sm font-medium text-white">0</span>
                                <span class="sr-only">items in cart, view bag</span>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </nav>
        </header>

        <div class="relative mx-auto flex max-w-3xl flex-col items-center px-6 py-32 text-center sm:py-64 lg:px-0">
            <h1 class="text-4xl font-bold tracking-tight text-white lg:text-6xl">
                New arrivals are here
            </h1>
            <p class="mt-4 text-xl text-white">
                The new arrivals have, well, newly arrived. Check out the latest options from our summer small-batch release while they're still in stock.
            </p>
            <a href="#" class="mt-8 inline-block rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900 hover:bg-gray-100">
                Shop New Arrivals
            </a>
        </div>
    </div>
</div>