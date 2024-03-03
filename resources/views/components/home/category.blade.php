<section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:mx-auto xl:max-w-7xl xl:px-8">
    <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
        <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900">Shop by Category</h2>
        <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
        Browse all categories
        <span aria-hidden="true"> &rarr;</span>
        </a>
    </div>

    <div class="mt-4 flow-root">
        <div class="-my-2">
        <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
            <div class="absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">
                @foreach($categories as $category)
                    <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                        <span aria-hidden="true" class="absolute inset-0">
                        <img
                            src="{{ empty($category->image_id) ? "https://placehold.co/600x600?text=". $category->category  : url('/storage/' . $category->image->path) }}"
                            alt="{{ $category->category }}"
                            class="h-full w-full object-cover object-center">
                        </span>
                        <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                        <span class="relative mt-auto text-center text-xl font-bold text-white">{{ $category->category }}</span>
                    </a>
                @endforeach
            </div>
        </div>
        </div>
    </div>

    <div class="mt-6 px-4 sm:hidden">
        <a href="#" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">
        Browse all categories
        <span aria-hidden="true"> &rarr;</span>
        </a>
    </div>
</section>