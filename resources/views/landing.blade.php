<x-guest-layout>

    <!-- hero big grid -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">

            <div class="flex flex-row flex-wrap items-stretch">
                <!--Start left cover-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1 flex flex-col">
                    <div class="relative hover-img max-h-90 overflow-hidden flex-1">
                        @if ($latestPost)
                        <a href="{{route('user.detail', ['id' => $latestPost->id])}}">
                            <img class="max-w-full w-full align-middle h-full  object-cover mx-auto" src="{{ asset('images/' . $latestPost->image) }}" alt="{{ $latestPost->title }}">
                        </a>
                        <div class="absolute px-5 pt-6 pb-5 bottom-0 w-full bg-gray-800 bg-opacity-30">
                            <h2 class="text-3xl font-bold capitalize text-white mb-3">{{ $latestPost->title }}</h2>
                            <p class="text-white hidden sm:inline-block text-base">
                                {{ Str::limit($latestPost->description, 120, '...') }}
                            </p>
                            <div class="pt-1 text-white">
                                <div class="inline-block h-4 border-l-2 border-red-600 mr-2"></div> {{ $latestPost->CategoryType->name ?? 'Unknown Author' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>


                <!--Start box news-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2 flex flex-col items-center justify-center">
                    <div class="mt-2 box-one flex flex-row flex-wrap flex-1 items-stretch justify-center">
                        @foreach($latestPostsByCategories as $post)
                        <div class="max-w-full w-full sm:w-1/2 flex flex-col">
                            <div class="relative hover-img  h-52 overflow-hidden">
                                <a href="{{ route('user.detail', ['id' => $post->id]) }}" class="w-full h-full block">
                                    <img class="w-full h-full object-cover"
                                        src="{{ asset('images/' . $post->image) }}"
                                        alt="{{ $post->title }}">
                                </a>
                                <div class="absolute px-4 pt-2 pb-2 bottom-0 w-full bg-gradient-cover bg-gray-800 bg-opacity-40">
                                    <a href="#">
                                        <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">{{ $post->title }}</h2>
                                    </a>
                                    <div class="pt-1">
                                        <div class="text-gray-100">
                                            <div class="inline-block h-3 border-l-2 border-red-600 mr-2 "></div>
                                            {{ $post->CategoryType->name ?? 'Unknown Author' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>


        </div>
    </div>


    <!-- block news -->
    <div class="bg-white">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-4 border-red-600 mr-2"></span>World News
                        </h2>
                    </div>

                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach($postsByCategoryType1 as $post)
                        <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="{{ route('user.detail', ['id' => $post->id]) }}" class="w-full h-62 block">
                                    <div class="relative w-full h-0 pb-[56.25%]">
                                        <img class="absolute inset-0 w-full h-full object-cover "
                                            src="{{ asset('images/' . $post->image) }}"
                                            alt="{{ $post->title }}">
                                    </div>
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="{{ route('user.detail', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ Str::limit($post->description, 80, '...') }}</p>
                                    <a class="text-gray-500" href="#">
                                        <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                        {{ $post->author->name ?? 'Unknown Author' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>



                </div>

                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-gray-50 h-full">
                        <div class="text-sm py-6 sticky">
                            <div class="w-full flex justify-center">
                                <!-- Contact Us Card -->
                                <div class="bg-white rounded-lg shadow-lg p-6 w-full lg:max-w-md">
                                    <h2 class="text-xl font-bold uppercase text-center mb-4">Contact Us</h2>
                                    <p class="text-gray-700 text-center mb-4">
                                        We'd love to hear from you! Reach out to us for any inquiries or feedback.
                                    </p>
                                    <div class="space-y-4">
                                        <!-- Email -->
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2.94 3.566A2 2 0 014.694 3h10.612a2 2 0 011.755 1.028L10 9.258 2.94 3.566zM18 8.697V14a2 2 0 01-2 2H4a2 2 0 01-2-2V8.697l7.553 5.387a1 1 0 001.09 0L18 8.697z" />
                                            </svg>
                                            <a href="mailto:support@yourwebsite.com" class="text-blue-500 hover:underline">
                                                support@worldviewwaves.com
                                            </a>
                                        </div>
                                        <!-- Phone -->
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M3 5a1 1 0 011-1h3a1 1 0 01.71.29l2 2a1 1 0 010 1.42L7.42 9.71a10.014 10.014 0 005.87 5.87l1.41-1.42a1 1 0 011.42 0l2 2a1 1 0 01.29.71v3a1 1 0 01-1 1h-1C7.163 19 1 12.837 1 5V4a1 1 0 011-1z" />
                                            </svg>
                                            <a href="tel:+123456789" class="text-blue-500 hover:underline">
                                                +123 456 789
                                            </a>
                                        </div>
                                        <!-- Address -->
                                        <div class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6c0 4.35 6 10 6 10s6-5.65 6-10a6 6 0 00-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-gray-700">
                                                123 Street Name, Yangon, Myanmar
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <!-- End of Card -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- slider news -->
    <div class="relative bg-gray-50" style="background-image: url('src/img/bg.jpg');background-size: cover;background-position: center center;background-attachment: fixed">
        <div class="bg-black bg-opacity-70">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                <div class="flex flex-row flex-wrap">
                    <div class="flex-shrink max-w-full w-full py-12 overflow-hidden">
                        <div class="w-full py-3">
                            <h2 class="text-white text-2xl font-bold text-shadow-black">
                                <span class="inline-block h-5 border-l-4 border-red-600 mr-2"></span>Sports News
                            </h2>
                        </div>

                        <div id="post-carousel" class="splide post-carousel">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @forelse($categoriesType2Posts as $post)
                                    <li class="splide__slide">
                                        <div class="w-full pb-3">
                                            <div class="hover-img bg-white">
                                                <a href="{{route('user.detail', ['id' => $post->id])}}">
                                                    <img class="max-w-full w-full mx-auto h-80 object-cover"
                                                        src="/images/{{ $post->image }}"
                                                        alt="{{ $post->title }}">
                                                </a>
                                                <div class="py-3 px-6  ">
                                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                                        <a href="{{route('user.detail', ['id' => $post->id])}}">{{ $post->title }}</a>
                                                    </h3>
                                                    <a class="text-gray-500" href="#"><span
                                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $post->author->name ?? 'Unknown Author' }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <li>No posts available for this category.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- block news -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold mb-10">
                            <span class="inline-block h-5 border-l-4 border-red-600 mr-2"></span> Business News

                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <!-- Each news item -->
                        @foreach ($categoryType3Posts as $post)
                        <div class="flex-shrink max-w-full w-full sm:w-1/2 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="{{ route('user.detail', ['id' => $post->id]) }}" class="w-full block">
                                    <div class="relative w-full h-0 pb-[56.25%]"> <!-- Aspect ratio for 16:9 -->
                                        <img class="absolute inset-0 w-full h-full object-cover "
                                            src="{{ asset('images/' . $post->image) }}"
                                            alt="{{ $post->title }}">
                                    </div>
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="{{ route('user.detail', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                        {{ Str::limit($post->description, 80, '...') }}
                                    </p>
                                    <a class="text-gray-500" href="#">
                                        <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                        {{ $post->categoryType->name ?? 'Unknown Category' }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-4 border-red-600 mr-2"></span>Education News
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5 ">
                            <div class="relative hover-img max-h-98 overflow-hidden">
                                <!-- thumbnail -->
                                <a href="{{ route('user.detail', ['id' => $latestCategoryType4Post->id]) }}" class="">
                                    <img class="w-full h-96 object-cover mx-auto" src="{{ asset('images/' . $latestCategoryType4Post->image) }}" alt="{{ $latestCategoryType4Post->title }}">
                                </a>

                                <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover bg-gray-800 bg-opacity-30 ">
                                    <!-- title -->
                                    <a href="{{ route('user.detail', ['id' => $latestCategoryType4Post->id]) }}">
                                        <h2 class="text-3xl font-bold capitalize text-white mb-3">
                                            {{ $latestCategoryType4Post->title }}
                                        </h2>
                                    </a>
                                    <p class="text-white hidden sm:inline-block">{{ Str::limit($latestCategoryType4Post->description, 120) }}</p>
                                    <!-- author and date -->
                                    <div class="pt-2">
                                        <div class="text-white">
                                            <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                            {{ $latestCategoryType4Post->author->name ?? 'Unknown Author' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 6 Posts for category_type_4 -->
                        @foreach($categoryType4Posts as $post)
                        <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="{{ route('user.detail', ['id' => $post->id]) }}" class="w-full h-62 block">
                                    <div class="relative w-full h-0 pb-[56.25%]">
                                        <img class="absolute inset-0 w-full h-full object-cover "
                                            src="{{ asset('images/' . $post->image) }}"
                                            alt="{{ $post->title }}">
                                    </div>
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="{{ route('user.detail', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ Str::limit($post->description, 80, '...') }}</p>
                                    <a class="text-gray-500" href="#">
                                        <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                        {{ $post->author->name ?? 'Unknown Author' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-white  border-2 border-gray-200 rounded-lg overflow-hidden ">
                        <div class="mb-6">
                            <div class="p-4 dark:bg-gray-300">
                                <h2 class="text-lg font-bold">Most Popular Education News</h2>
                            </div>
                            <ul class="post-number">
                                @foreach($popularPostsFor4 as $post)

                                <li class="border-b border-gray-300 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="{{ route('user.detail', $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-2">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="w-full py-3">
                <h2 class="text-gray-800 text-2xl font-bold mb-5">
                    <span class="inline-block h-5 border-l-4 border-red-600 mr-2"></span>Entertainment News
                </h2>
            </div>
            <div class="flex flex-row flex-wrap">
                <!-- sidebar (Most Popular) on the left -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-4 lg:pr-8  lg:pb-8 order-first lg:order-first">
                    <div class="w-full bg-white border-2 border-gray-200 rounded-lg overflow-hidden">
                        <div class="mb-6">
                            <div class="p-4 dark:bg-gray-300">
                                <h2 class="text-lg font-bold">Most Popular Entertainment News</h2>
                            </div>
                            <ul class="post-number">
                                @foreach($popularPostsFor5 as $post)
                                <li class="border-b border-gray-300 hover:bg-gray-50 p-4 flex">
                                    <!-- Post Image -->
                                    <div class="w-1/3">
                                        <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
                                    </div>
                                    <!-- Post Details -->
                                    <div class="w-2/3 px-4 py-3">
                                        <a href="{{ route('user.detail', $post->id) }}" class="text-lg font-bold hover:underline">
                                            {{ $post->title }}
                                        </a>
                                        <div class="text-sm text-gray-500">
                                            {{ $post->created_at->format('d M Y') }} | {{ $post->CategoryType->name ?? 'Unknown Category' }}
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>


                <!-- post content on the right -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">

                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            <div class="relative hover-img max-h-98 overflow-hidden">
                                <!-- thumbnail -->
                                <a href="{{ route('user.detail', ['id' => $latestCategoryType5Post->id]) }}" class="">
                                    <img class="w-full h-96 object-cover mx-auto" src="{{ asset('images/' . $latestCategoryType5Post->image) }}" alt="{{ $latestCategoryType5Post->title }}">
                                </a>
                                <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover bg-gray-800 bg-opacity-30 ">
                                    <!-- title -->
                                    <a href="{{ route('user.detail', ['id' => $latestCategoryType5Post->id]) }}">
                                        <h2 class="text-3xl font-bold capitalize text-white mb-3">
                                            {{ $latestCategoryType5Post->title }}
                                        </h2>
                                    </a>
                                    <p class="text-white hidden sm:inline-block">{{ Str::limit($latestCategoryType5Post->description, 120) }}</p>
                                    <!-- author and date -->
                                    <div class="pt-2">
                                        <div class="text-white">
                                            <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                            {{ $latestCategoryType5Post->author->name ?? 'Unknown Author' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($categoryType5Posts as $post)
                        <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="{{ route('user.detail', ['id' => $post->id]) }}" class="w-full h-62 block">
                                    <div class="relative w-full h-0 pb-[56.25%]">
                                        <img class="absolute inset-0 w-full h-full object-cover "
                                            src="{{ asset('images/' . $post->image) }}"
                                            alt="{{ $post->title }}">
                                    </div>
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="{{ route('user.detail', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ Str::limit($post->description, 80, '...') }}</p>
                                    <a class="text-gray-500" href="#">
                                        <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                        {{ $post->author->name ?? 'Unknown Author' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- </main><!-- end main --> --}}
</x-guest-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#post-carousel', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            gap: '1rem',
            arrows: true,
            pagination: false,
            breakpoints: {
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 1,
                },
            },
        }).mount();
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>