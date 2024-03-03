<div x-data="{ category: {}, mobile: false, mobileCategory: {}, subCategory: {} }">
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
                <button @click="mobile = !mobile" type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>

                <!-- Links -->
                <div class="mt-2">
                    <div id="tabs-1-panel-1" class="space-y-10 px-4 pb-8 pt-10" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <div class="space-y-10">
                            @foreach($categories as $category)
                                <div>
                                    <div class="flex justify-between">
                                        <p id="women-shoes-heading-mobile" class="font-medium text-gray-900 hover:text-indigo-700">{{ $category->category }}</p>
                                        <svg @click="mobileCategory['{{ $category->id }}'] = !mobileCategory['{{ $category->id }}']" class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path x-show="!mobileCategory['{{ $category->id }}']" stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            <path x-show="mobileCategory['{{ $category->id }}']" stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </div>
                                    <div x-cloak x-show="mobileCategory['{{ $category->id }}']" @click.away="mobileCategory['{{ $category->id }}'] = false">
                                        <ul role="list" aria-labelledby="women-shoes-heading-mobile" class="mt-6 flex flex-col space-y-6">
                                            @foreach($category->children()->get() as $subCategory)
                                                <li class="flow-root">
                                                    <div class="flex justify-between">
                                                        <a href="#" wire:navigate class="-m-2 block p-2 text-gray-500 hover:text-indigo-700"> {{ $subCategory->category }} </a>
                                                        <svg @click="subCategory['{{ $subCategory->id }}'] = !subCategory['{{ $subCategory->id }}']" class="block h-5 w-5 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                            <path x-show="!subCategory['{{ $subCategory->id }}']" stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                            <path x-show="subCategory['{{ $subCategory->id }}']" stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                        </svg>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    @if(\Illuminate\Support\Facades\Auth::check())

                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Account</a>
                        </div>

                    @else

                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
                        </div>
                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                        </div>

                    @endif
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
                <div class="mx-auto flex h-10 max-w-7xl items-center justify-end px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center space-x-6">
                        @if(!\Illuminate\Support\Facades\Auth::check())
                            <a href="{{ route('login') }}" class="text-sm font-medium text-white hover:text-gray-100">Sign in</a>
                            <a href="{{ route('register') }}" class="text-sm font-medium text-white hover:text-gray-100">Create an account</a>
                        @else
                            <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Account</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>

                                @csrf

                                <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-sm font-medium text-white hover:text-gray-100">Log Out</a>
                            </form>
                        @endif
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
                        <a href="/" wire:navigate >
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
                        <button type="button" @click="mobile = !mobile" class="-ml-2 p-2 text-white">
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
                        <a href="/" wire:navigate class="lg:hidden">
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
                            <a href="{{ route('cart') }}" wire:navigate class="group -m-2 flex items-center p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flex-shrink-0 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                <span class="ml-2 text-sm font-medium text-white">
                                    <livewire:cart.count />
                                </span>
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

    </div>
</div>