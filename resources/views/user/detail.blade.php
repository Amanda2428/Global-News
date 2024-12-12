<x-guest-layout>

    <body class="bg-gray-100 text-gray-800">
        <div class="container mx-auto px-4 py-8">
            <!-- News Title -->
            <h1 class="text-4xl font-bold text-center mb-6">{{ $item->title }}</h1>

            <!-- Author Info -->
            <div class="flex items-center  justify-center space-x-4 mb-8 text-sm text-gray-500">
                <a href="{{route('user.author-list',['id' => $item->author->id])}}">
                    <img class="w-14 h-14 rounded-full object-cover" src="{{ $item->author->profile ? asset( $item->author->profile) : asset('images/default-profile.jpg')}}" alt="Author Profile">
                </a>

                <a href="{{route('user.author-list',['id' => $item->author->id])}}">
                    <span class="underline"> <strong>{{ $item->author->name }}</strong></span>
                </a>

                <span>•</span>
                <span>Uploaded on: <time datetime="{{ $item->created_at->toDateString() }}">{{ $item->created_at->format('F j, Y') }}</time></span>
            </div>


            <div class="flex flex-col lg:flex-row">
                <!-- Video Section -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 relative">
                    <div class="relative pb-9/16 rounded-lg shadow-lg overflow-hidden mb-8" style="position: relative; padding-top: 56.25%;">
                        <iframe
                            class="absolute top-0 left-0 w-full h-full"
                            src="/videos/{{ $item->video }}"
                            title="News Video"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Most Popular Section -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-white  border-2 border-gray-200 rounded-lg overflow-hidden ">
                        <div class="mb-6">
                            <div class="p-4 dark:bg-gray-300">
                                <h2 class="text-lg font-bold">For More News</h2>
                            </div>
                            <ul class="post-number">
                                @foreach ($latestCategories as $category)
                                <li class="border-b border-gray-300 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="{{ route('user.detail', $category->id) }}">
                                        {{ $category->title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <blockquote class=" rounded relative p-4 border-l-4 border-indigo-600 bg-gray-100 dark:bg-gray-400 dark:bg-opacity-40 mb-4 text-xl">
                <p class="mb-2"> Author Bio</p>
                <span class="absolute opacity-80 w-8 h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-600" viewBox="0 0 270.000000 270.000000">
                        <g transform="translate(0.000000,270.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                            <path d="M920 2182 c-290 -124 -482 -341 -540 -610 -30 -140 -40 -296 -40 -644 l0 -328 370 0 370 0 0 370 0 370 -181 0 -181 0 7 63 c26 243 129 387 342 477 35 15 66 29 69 32 7 7 -132 298 -143 298 -4 0 -37 -13 -73 -28z"></path>
                            <path d="M2179 2186 c-249 -103 -442 -295 -520 -516 -50 -142 -61 -247 -66 -677 l-5 -393 371 0 371 0 0 370 0 370 -181 0 -181 0 7 53 c21 170 67 281 150 363 51 49 143 107 215 134 19 7 39 17 44 21 10 9 -124 298 -139 298 -5 0 -35 -10 -66 -23z"></path>
                        </g>
                    </svg>
                </span>
                <a href="{{route('user.author-list',['id' => $item->author->id])}}">
                    <p class="ml-16 mb-4">{{ $item->author->bio }}</p>
                    <footer class="ml-16 text-base">Posted by <cite title="Source Title" class="text-indigo-600 underline">{{ $item->author->name }}</cite></footer>
                </a>

            </blockquote>
            <!-- Combined Container -->
            <div class="flex flex-col bg-white rounded-lg shadow-md p-6 mt-5 mb-8 border-gray-300">

                <!-- Description and Image Section -->
                <div class="flex flex-col md:flex-row items-center mb-8">
                    <!-- Description -->
                    <div class="w-full md:w-1/2 mb-6 md:mb-0 md:pr-6">
                        <h2 class="text-2xl font-semibold mb-4">For More Details</h2>
                        <p class="text-lg mb-4">
                            {{ $item->description }}
                        </p>
                        <div class="mt-6">
                            <a href="{{ $item->social_media_link }}" target="_blank" class="text-blue-600 hover:underline">
                                <i class="fas fa-share-alt"></i> View Source of this Post
                            </a>
                            </a>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-1/2 shadow-md">
                        <img
                            src="/images/{{ $item->image }}"
                            alt="News Image"
                            class="rounded-lg w-full h-auto">
                    </div>
                </div>

                <!-- Views and Buttons Section -->
                <div class="flex justify-between items-center bg-white rounded-lg ">
                    <!-- Views -->
                    <div class="text-gray-600 text-lg">
                        <i class="far fa-eye mr-2"></i> Views: <span class="font-bold"> {{ number_format($totalViews) }}</span>
                    </div>
                    <!-- Buttons -->
                    <div class="flex space-x-4">
                        <!-- Comment Button -->
                        <button
                            onclick="openModal()"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">
                            <i class="far fa-comment mr-2"></i>Comment
                        </button>
                    </div>
                </div>
            </div>



            <!-- Existing Comments Section -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h3 class="text-2xl font-semibold mb-4">Comments Section</h3>
                <div class="space-y-4">
                    @if($comments->isEmpty())
                    <!-- No Comments Message -->
                    <p class="text-gray-500 text-center">There are no comments yet. Be the first to leave one!</p>
                    @else
                    <!-- Comments List -->
                    <div class="space-y-4">
                        <hr>
                        <hr>
                        @foreach($comments as $comment)
                        <div class="border-b pb-4 flex items-start justify-between">
                            <div class="flex items-center space-x-3">
                                <!-- User Profile Image -->
                                <img class="w-14 h-14 rounded-full object-cover" src="{{ $comment->user->profile ? asset('storage/' . $comment->user->profile) : asset('images/default-profile.jpg')}}" alt="User Profile">
                                <!-- User Name and Comment -->
                                <div>
                                    <p class="font-semibold">{{ $comment->user->name }}</p>
                                    <p>{{ $comment->description }}</p>
                                </div>
                            </div>
                            <!-- Comment Timestamp -->
                            <span class="text-sm text-gray-500">Posted at: {{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>


        </div>

        <!-- Modal for Adding Comments -->
        <div id="commentModal" class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h3 class="text-2xl font-semibold mb-4">Add a Comment</h3>
                <form action="{{ route('user.comment') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Your Comment</label>
                        <textarea
                            id="comment"
                            name="comment"
                            rows="4"
                            class="mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="category_id" value="{{ $item->id }}">

                    </div>
                    <div class="flex justify-end space-x-4">
                        <button
                            type="button"
                            onclick="closeModal()"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Script for Modal -->
        <script>
            function openModal() {
                document.getElementById('commentModal').classList.remove('hidden');
                document.getElementById('commentModal').classList.add('flex');
            }

            function closeModal() {
                document.getElementById('commentModal').classList.add('hidden');
                document.getElementById('commentModal').classList.remove('flex');
            }
        </script>
    </body>
</x-guest-layout>