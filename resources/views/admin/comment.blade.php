<x-admin-layout>
    <div id="main-content" class="h-full w-full bg-gray-50 ">
        <main>

            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="mb-1 w-full">
                    <div class="mb-4">
                        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Comments</h1>
                    </div>
                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <form action="{{ route('admin.CommentsPagesearch') }}" method="GET">
                                <div class="mt-1 relative lg:w-64 xl:w-96">
                                    <!-- Search input field -->
                                    <input type="text" name="query" id="categories-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="Search for Users with name" value="{{ request('query') }}">

                                    <!-- Submit button -->
                                    <button type="submit" class="hidden"></button>

                                    <!-- Cancel button -->
                                    <a href="{{ route('admin.goToComments') }}"
                                        class="absolute right-2 top-2 bg-gray-300 text-gray-700 rounded px-4 py-1 text-sm hover:bg-gray-400">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden">
                            <table class="table-fixed min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all" aria-describedby="checkbox-1"
                                                    type="checkbox"
                                                    class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Comment ID
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            User Name
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Comment
                                        </th>

                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Commented Category Title
                                        </th>

                                        <th scope="col" class="p-4">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if($comments->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center p-4 text-gray-500">
                                            No results found for "{{ isset($query) ? $query : '' }}".
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($comments as $comment)
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-4 w-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-{{ $comment->id }}" type="checkbox"
                                                    class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                <label for="checkbox-{{ $comment->id }}" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $comment->id }}</td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $comment->user->name ?? 'N/A' }}</td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $comment->user->email  }}</td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $comment->description }}</td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $comment->category->title ?? 'N/A' }}</td>
                                        <td class="p-4 whitespace-nowrap space-x-2">
                                            <button type="button" onclick="openingModal('{{ $comment->id }}')"
                                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete Comment
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
                <div class="flex items-center mb-4 sm:mb-0">
                    <a href="#"
                        class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#"
                        class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <span class="text-sm font-normal text-gray-500">Showing <span
                            class="text-gray-900 font-semibold">1-20</span> of <span
                            class="text-gray-900 font-semibold">2290</span></span>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="#"
                        class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        <svg class="-ml-1 mr-1 h-5 w-5" fill=" currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Previous
                    </a>
                    <a href="#"
                        class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Next
                        <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Delete User Modal -->
            @foreach ($comments as $comment )
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
                            <a href="{{ route('admin.commentDelete', ['id' => $comment->id]) }}"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </a>

                            <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center" onclick="closeingModal('{{ $comment->id }}')">
                                No, cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function openingModal(id) {
                console.log('Opening modal for ID:', id); // Check if the function is called
                document.getElementById('delete-user-modal-' + id).classList.remove('hidden');
            }


            function closeingModal(id) {
                document.getElementById('delete-user-modal-' + id).classList.add('hidden');
            }

            window.openingModal = openingModal;
            window.closeingModal = closeingModal;
        });
    </script>

</x-admin-layout>