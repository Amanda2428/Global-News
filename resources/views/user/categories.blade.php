    <x-guest-layout>
        <!-- =========={ MAIN }==========  -->
        <main id="content">


            <!-- block news -->
            <div class="bg-gray-50 py-6">
                <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                    <div class="flex flex-row flex-wrap">
                        <!-- Left -->
                        <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
                            <div class="w-full py-3">
                                @foreach ($categories->unique('category_type_id') as $items)
                                <h2 class="text-gray-800 text-2xl font-bold">

                                <span class="inline-block h-5 border-l-2 border-red-600 mr-2 "></span>{{ optional($items->categoryType)->name ?? 'Unknown' }}

                                </h2>
                                @endforeach
                            </div>
                            <div class="w-full mx-auto mb-10">

                                <div id="default-carousel" class="relative rounded-lg overflow-hidden shadow-lg" data-carousel="static">
                                    <!-- Carousel wrapper -->
                                    <div class="relative h-80 md:h-96" data-carousel-inner>
                                        @foreach ($categories as $items )
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <iframe width="100%" height="100%" src="/videos/{{ $items->video }}"
                                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        @endforeach
                                    </div>

                                    <!-- Slider indicators -->
                                    <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2" data-carousel-indicators>
                                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
                                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
                                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
                                    </div>
                                    <!-- Slider controls -->
                                    <button type="button"
                                        class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                                        data-carousel-prev>
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                                        data-carousel-next>
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-row flex-wrap -mx-3">
                                @foreach ($categories as $items )
                                <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                    <a href="{{ route('user.detail', $items->id) }}">
                                        <div class="flex flex-row sm:block hover-img">
                                            <div class="hidden">
                                                {{ $items->id }}
                                            </div>
                                            <!-- Image Wrapper with Aspect Ratio -->
                                            <div class="relative w-full" style="padding-top: 70.25%; /* 16:9 Aspect Ratio */">
                                                <img class="absolute top-0 left-0 w-full h-full object-cover" src="/images/{{ $items->image }}" alt="Image">
                                            </div>
                                            <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                                <h3 class="text-lg font-bold leading-tight mb-2">
                                                    {{ $items->title }}
                                                </h3>
                                                <p class="hidden md:block text-gray-600 leading-tight mb-1 line-clamp-2">
                                                    {{ Str::limit($items->description, 100, '...') }}
                                                </p>
                                                <span class="text-gray-500">
                                                    <span class="inline-block h-3 border-l-2 border-indigo-600 mr-2"></span> {{ $items->author->name ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- right -->
                        <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                            <div class="w-full bg-white">
                                <div class="mb-6">
                                    <div class="p-4 bg-gray-100">
                                        <h2 class="text-lg font-bold">Most Popular</h2>
                                    </div>
                                    <ul class="post-number">
                                        @foreach ($categories->take(5) as $items)
                                        <li class=" hidden">
                                            <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">{{ $items->id }}</a>
                                        </li>
                                        <li class="border-b border-gray-100 hover:bg-gray-50">
                                            <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">{{ $items->title }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- end main -->




    </x-guest-layout>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>