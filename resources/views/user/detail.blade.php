<x-guest-layout>

    <body class="bg-gray-100 text-gray-800">
        <div class="container mx-auto px-4 py-8">
            <!-- News Title -->
            <h1 class="text-4xl font-bold text-center mb-6">{{ $item->title }}</h1>

            <!-- Author Info -->
            <div class="flex items-center  justify-center space-x-4 mb-8 text-sm text-gray-500">
                <a href="{{route('user.author-list', ['id' => $item->author->id])}}">
                    <img class="h-14 w-14 rounded-full object-cover"
                        src="{{ asset('images/' . ($item->author->profile ?? 'default-profile.jpg')) }}"
                        alt="Author Avatar">
                </a>

                <a href="{{route('user.author-list', ['id' => $item->author->id])}}">
                    <span class="underline"> <strong>{{ $item->author->name }}</strong></span>
                </a>

                <span>•</span>
                <span>Uploaded on: <time
                        datetime="{{ $item->created_at->toDateString() }}">{{ $item->created_at->format('F j, Y') }}</time></span>
            </div>


            <div class="flex flex-col lg:flex-row">
                <!-- Video Section -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 relative">
                    <div class="relative pb-9/16 rounded-lg shadow-lg overflow-hidden mb-8"
                        style="position: relative; padding-top: 56.25%;">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="/videos/{{ $item->video }}"
                            title="News Video" frameborder="0"
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
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center"
                                        href="{{ route('user.detail', $category->id) }}">
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

            <blockquote
                class=" rounded relative p-4 border-l-4 border-indigo-600 bg-gray-100 dark:bg-gray-400 dark:bg-opacity-40 mb-4 text-xl">
                <p class="mb-2"> Author Bio</p>
                <span class="absolute opacity-80 w-8 h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-600" viewBox="0 0 270.000000 270.000000">
                        <g transform="translate(0.000000,270.000000) scale(0.100000,-0.100000)" fill="currentColor"
                            stroke="none">
                            <path
                                d="M920 2182 c-290 -124 -482 -341 -540 -610 -30 -140 -40 -296 -40 -644 l0 -328 370 0 370 0 0 370 0 370 -181 0 -181 0 7 63 c26 243 129 387 342 477 35 15 66 29 69 32 7 7 -132 298 -143 298 -4 0 -37 -13 -73 -28z">
                            </path>
                            <path
                                d="M2179 2186 c-249 -103 -442 -295 -520 -516 -50 -142 -61 -247 -66 -677 l-5 -393 371 0 371 0 0 370 0 370 -181 0 -181 0 7 53 c21 170 67 281 150 363 51 49 143 107 215 134 19 7 39 17 44 21 10 9 -124 298 -139 298 -5 0 -35 -10 -66 -23z">
                            </path>
                        </g>
                    </svg>
                </span>
                <a href="{{route('user.author-list', ['id' => $item->author->id])}}">
                    <p class="ml-16 mb-4">{{ $item->author->bio }}</p>
                    <footer class="ml-16 text-base">Posted by <cite title="Source Title"
                            class="text-indigo-600 underline">{{ $item->author->name }}</cite></footer>
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
                            <a href="{{ $item->social_media_link }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                <i class="fas fa-share-alt"></i> View Source of this Post
                            </a>
                            </a>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-1/2 shadow-md">
                        <img src="/images/{{ $item->image }}" alt="News Image" class="rounded-lg w-full h-auto">
                    </div>
                </div>

                <!-- Views and Buttons Section -->
                <div class="flex justify-between items-center bg-white rounded-lg ">
                    <!-- Views -->
                    <div class="text-gray-600 text-lg">
                        <i class="far fa-eye mr-2"></i> Views: <span class="font-bold">
                            {{ number_format($totalViews) }}</span>
                    </div>
                    <!-- Buttons -->
                    <div class="flex space-x-4">
                        <!-- Comment Button -->
                        <button onclick="openModal()"
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
                        @foreach($comments as $comment)
                        <div class="border-b pb-4 flex items-start justify-between">
                            <div class="flex items-center space-x-3">
                                <!-- User Profile Image -->
                                <img class="w-14 h-14 rounded-full object-cover"
                                    src="{{ $comment->user->profile ? asset('storage/' . $comment->user->profile) : asset('images/default-profile.jpg')}}"
                                    alt="User Profile">
                                <!-- User Name and Comment -->
                                <div>
                                    <p class="font-semibold">{{ $comment->user->name }}</p>
                                    <p>{{ $comment->description }}</p>
                                </div>
                            </div>
                            <!-- Comment Timestamp and Actions -->
                            <div class="text-right space-y-2">
                                <span class="text-sm text-gray-500 block">Posted at:
                                    {{ $comment->created_at->diffForHumans() }}</span>
                                <!-- Action Buttons -->
                                <div class="flex space-x-2 justify-end">
                                    @if (Auth::id() === $comment->user_id)
                                    <!-- Edit Button -->
                                    <a href="javascript:void(0);"
                                        onclick="openModal('edit', '{{ $comment->id }}', '{{ $comment->description }}')"
                                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <!-- Delete Button -->
                                    <button type="button" onclick="openingModal('{{ $comment->id }}')"
                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-4 py-2">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>



        </div>

        <!-- Modal for Adding/Editing Comments -->
        <div id="commentModal"
            class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h3 id="modalTitle" class="text-2xl font-semibold mb-4">Add a Comment</h3>
                <form id="commentForm" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="_method" id="methodInput" value="POST"> <!-- Method Input -->
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Your Comment</label>
                        <textarea id="comment" name="comment" rows="4"
                            class="p-2 mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="category_id" id="categoryIdInput" value="{{ $item->id }}">
                        <input type="hidden" name="comment_id" id="commentIdInput" value="">
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="closeModal()"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                            Cancel
                        </button>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Delete User Modal -->
        @foreach($comments as $comment)
        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm"
            id="delete-user-modal-{{ $comment->id }}">
            <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative">
                    <!-- Modal header -->
                    <div class="flex justify-end p-2">
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeingModal('{{ $comment->id }}')">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 pt-0 text-center">
                        <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this Comment?</h3>
                        <form action="{{ route('user.comment.destroy', ['id' => $comment->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                        </form>
                        <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center" onclick="closeingModal('{{ $comment->id }}')">
                            No, cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        <script>
            function openModal(action = 'add', commentId = null, commentText = '', categoryId = null) {
                // Update modal title and form action
                const modalTitle = document.getElementById('modalTitle');
                const commentForm = document.getElementById('commentForm');
                const methodInput = document.getElementById('methodInput');
                const commentTextarea = document.getElementById('comment');
                const categoryIdInput = document.getElementById('categoryIdInput');
                const commentIdInput = document.getElementById('commentIdInput');

                if (action === 'edit') {
                    modalTitle.innerText = 'Edit Comment';
                    commentForm.action = `/user/comment/${commentId}`; // Set the action for the PATCH route
                    methodInput.value = 'PATCH'; // Set the method to PATCH
                    commentTextarea.value = commentText; // Populate the textarea with the existing comment
                    commentIdInput.value = commentId; // Set the hidden comment ID
                    categoryIdInput.value = categoryId; // Set the hidden category ID
                } else {
                    modalTitle.innerText = 'Add a Comment';
                    commentForm.action = `{{ route('user.comment') }}`; // Reset action for POST (add new comment)
                    methodInput.value = 'POST'; // Set the method to POST
                    commentTextarea.value = ''; // Clear the textarea
                    commentIdInput.value = ''; // Reset the comment ID
                    categoryIdInput.value = categoryId || '{{ $item->id }}'; // Set the category ID
                }

                // Show modal
                document.getElementById('commentModal').classList.remove('hidden');
                document.getElementById('commentModal').classList.add('flex');
            }

            function closeModal() {
                document.getElementById('commentModal').classList.add('hidden');
                document.getElementById('commentModal').classList.remove('flex');
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function openingModal(id) {
                    console.log('Opening modal for ID:', id); // Debugging log
                    document.getElementById('delete-user-modal-' + id).classList.remove('hidden');
                }

                function closeingModal(id) {
                    document.getElementById('delete-user-modal-' + id).classList.add('hidden');
                }

                window.openingModal = openingModal;
                window.closeingModal = closeingModal;
            });
        </script>

    </body>
</x-guest-layout>