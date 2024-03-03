<section aria-labelledby="collection-heading" class="mx-auto max-w-xl px-4 py-24 sm:px-6 sm:pt-32 lg:max-w-7xl lg:px-8">
    <h2 id="collection-heading" class="text-2xl font-bold tracking-tight text-gray-900">Shop by Collection</h2>
    <p class="mt-4 text-base text-gray-500">Each season, we collaborate with world-class designers to create a collection inspired by the natural world.</p>

    <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
        @foreach($collections as $collection)
            <a href="#" class="group block">
                <div aria-hidden="true" class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                    <img
                        src="{{ empty($collection->image_id) ? "https://placehold.co/600x600?text=". $collection->category  : url('/storage/' . $collection->image->path) }}"
                        alt="Brown leather key ring with brass metal loops and rivets on wood table."
                        class="h-full w-full object-cover object-center">
                </div>
                <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $collection->category }}</h3>
                <p class="mt-2 text-sm text-gray-500">Keep your phone, keys, and wallet together, so you can lose everything at once.</p>
            </a>
        @endforeach
    </div>
</section>