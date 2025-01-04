<x-guest-layout>
    <!-- =========={ MAIN }==========  -->
    <main id="content">
        <!-- Author Profile Section -->
        <div class="p-2 flex flex-row flex-wrap w-full">
            <div class="flex-shrink max-w-full w-full lg:w-full overflow-hidden">
                <div class="w-full py-3">
                    <h2 class="text-gray-800 text-2xl font-bold mb-2">
                        <span class="inline-block h-5 border-l-4 border-red-600 mr-2"></span> Author Profile
                    </h2>
                </div>

                <div class="flex flex-row flex-wrap -mx-3 w-full">
                    <div class="flex-shrink max-w-full w-full px-3 ">
                        <div class="p-4 border border-gray-100 bg-gray-200 mb-4 ">
                            <div class="flex flex-row items-center">
                                <div class="rounded-full overflow-hidden">
                                    <img class="border max-w-full w-20 sm:w-32 rounded-full" src="{{ asset('images/' . ($author->profile ?? 'default-profile.jpg')) }}"
                                        alt="Author Avatar">
                                </div>
                                <div class="ml-8">
                                    <h4 class="text-2xl">
                                        <span class="font-bold">Author Name: {{ $author->name }}</span>
                                    </h4>
                                    <p>{{ $author->bio }}</p>
                                    <p>{{ $author->phone}}</p>
                                    <p>{{ $author->email}}</p>
                                    <!-- social -->
                                    <div class="mt-2">
                                        <ul class="space-x-3">
                                            <!-- facebook -->
                                            <li class="inline-block">
                                                <a target="_blank" class="hover:text-gray-900" rel="noopener noreferrer" href="https://facebook.com" title="Facebook">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <!-- twitter -->
                                            <li class="inline-block">
                                                <a target="_blank" class="hover:text-gray-900" rel="noopener noreferrer" href="https://twitter.com" title="Twitter">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <!-- youtube -->
                                            <li class="inline-block">
                                                <a target="_blank" class="hover:text-gray-900" rel="noopener noreferrer" href="https://youtube.com" title="Youtube">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M508.64,148.79c0-45-33.1-81.2-74-81.2C379.24,65,322.74,64,265,64H247c-57.6,0-114.2,1-169.6,3.6-40.8,0-73.9,36.4-73.9,81.4C1,184.59-.06,220.19,0,255.79q-.15,53.4,3.4,106.9c0,45,33.1,81.5,73.9,81.5,58.2,2.7,117.9,3.9,178.6,3.8q91.2.3,178.6-3.8c40.9,0,74-36.5,74-81.5,2.4-35.7,3.5-71.3,3.4-107Q512.24,202.29,508.64,148.79ZM207,353.89V157.39l145,98.2Z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <!-- instagram -->
                                            <li class="inline-block">
                                                <a target="_blank" class="hover:text-gray-900" rel="noopener noreferrer" href="https://instagram.com" title="Instagram">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                                        <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                                        <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                                    </svg>
                                                </a>
                                            </li><!-- end instagram -->
                                        </ul>
                                    </div>
                                    <!-- end social -->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Block News Section -->
        <div class="bg-white ">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                <div class="flex flex-row flex-wrap">
                    <div class="flex-shrink max-w-full w-full overflow-hidden">
                        <div class="w-full py-3">
                            <h2 class="text-gray-800 text-2xl font-bold mb-10">
                                <span class="inline-block h-5 border-l-4 border-red-600 mr-2"></span>
                                Posts by
                                <!-- Display author name -->
                                @if ($author->categories->isNotEmpty())
                                {{ $author->name ?? 'Unknown Author' }}
                                @else
                                Unknown Author
                                @endif
                            </h2>
                        </div>
                        <div class="flex flex-row flex-wrap -mx-3">
                            <!-- Each news item -->
                            @foreach ($author->categories as $post)
                            <div class="flex-shrink max-w-full w-full sm:w-1/2 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('user.detail', ['id' => $post->id]) }}" class="w-full block">
                                        <div class="relative w-full h-0 pb-[56.25%]"> <!-- Aspect ratio for 16:9 -->
                                            <img class="absolute inset-0 w-full h-full object-cover rounded-md"
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
    </main>




</x-guest-layout>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>