<x-admin-layout>
    <div id="main-content" class="h-full w-full bg-gray-50 ">
        <main>

            <div class="p-2 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="p-3 mb-1 w-full">
                    <div class="mb-4">
                        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Create World News</h1>
                    </div>
                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <form action="{{ route('admin.category.WorldPagesearch', ['id' => 1]) }}" method="GET">
                                <div class="mt-1 relative lg:w-64 xl:w-96">
                                    <!-- Search input field -->
                                    <input type="text" name="query" id="categories-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="Search for World News with title" value="{{ request('query') }}">

                                    <!-- Submit button -->
                                    <button type="submit" class="hidden"></button>

                                    <!-- Cancel button -->
                                    <a href="{{ route('admin.goToWorldPage', ['id' => 1]) }}" class="absolute right-2 top-2 bg-gray-300 text-gray-700 rounded px-4 py-1 text-sm hover:bg-gray-400">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            </form>

                        </div>
                        <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                            @if (Auth::user()->owner == '1' || Auth::user()->category_type == '1')
                            <button type="button" data-modal-toggle="add-user-modal"
                                class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add More News
                            </button>
                            @elseif(Auth::user()->owner == '0' || Auth::user()->category_type == '0')
                            <button type="button" data-modal-toggle="add-user-modal"
                                class="hidden w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add More News
                            </button>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="container mt-1">    
                @if(session('success'))
                <div class="relative w-full px-5 py-4 mx-auto">
                    <div class="p-6 border-l-4 border-green-600 rounded-r-xl bg-green-100">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm text-green-600">
                                    <p>{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="relative w-full px-5 py-4 mx-auto">
                    <div class="p-6 border-l-4 border-red-600 rounded-r-xl bg-red-100">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                                    <path fill="currentColor"
                                        d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm text-red-700">
                                    <p>{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

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
                                                    type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            ID
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Image
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Video
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Title
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Description
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Social Media Link
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Author Name
                                        </th>
                                        <th scope="col" class="p-4">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if($categories->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center p-4 text-gray-500">
                                            No results found for "{{ isset($query) ? $query : '' }}".
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($categories as $items)
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-4 w-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                                                    class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                <label for="checkbox-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $items->id }}</td>
                                        <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                            <img class="h-30 w-30" src="/images/{{ $items->image }}" alt="Image">
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            <video class="h-50 w-50" controls>
                                                <source src="/videos/{{ $items->video }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $items->title }}</td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ Str::limit($items->description, 40, '...') }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            <a href="{{ $items->social_media_link }}" target="_blank">{{ $items->social_media_link }}</a>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $items->author->name ?? 'N/A' }}
                                        </td>

                                        <td class="p-4 whitespace-nowrap space-x-2">
                                            @if (Auth::user()->owner == '1' || Auth::user()->category_type == '1')
                                            <button type="button" onclick="openModal('{{ $items->id }}', '{{ $items->title }}', '{{ $items->description }}', '{{ $items->image }}', '{{ $items->video }}', '{{ $items->social_media_link }}', '{{$items->author_id}}')" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-edit mr-2"></i>Edit Content
                                            </button>
                                            <button type="button" onclick="openDeleteModal('{{ $items->id }}')" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete Content
                                            </button>
                                            @elseif(Auth::user()->owner == '0' || Auth::user()->category_type == '0')
                                            <button type="button" onclick="openModal('{{ $items->id }}', '{{ $items->title }}', '{{ $items->description }}', '{{ $items->image }}', '{{ $items->video }}', '{{ $items->social_media_link }}', '{{$items->author_id}}')" class=" hidden text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-edit mr-2"></i>Edit Content
                                            </button>
                                            <button type="button" onclick="openDeleteModal('{{ $items->id }}')" class="hidden text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete Content
                                            </button>
                                            @endif

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

            <div class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
                <div class="flex items-center mb-4 sm:mb-0">
                    <a href="{{$categories->previousPageUrl() }}" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="{{ $categories->nextPageUrl() }}" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <span class="text-sm font-normal text-gray-500">Showing <span class="text-gray-900 font-semibold">{{ $categories->firstItem() }}-{{ $categories->lastItem() }}</span> of <span class="text-gray-900 font-semibold">{{ $categories->total() }}</span></span>
                </div>
                <div class="flex items-center space-x-3">
                    @if ($categories->onFirstPage())
                    <span class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                        Previous
                    </span>
                    @else
                    <a href="{{ $categories->previousPageUrl() }}" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Previous
                    </a>
                    @endif
                    @if ($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Next
                    </a>
                    @else
                    <span class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                        Next
                    </span>
                    @endif
                </div>
            </div>





            <!-- Edit User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm" id="user-modal">

                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto ">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold">Edit Content</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeModal()">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form method="POST" action="{{ route('admin.category.update' ) }}">
                            @csrf
                            @method('PUT')
                            <div class="p-2 space-y-3">
                                <input type="hidden" name="id" id="modal-category-id" value="">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="title" class="text-sm font-medium text-gray-900 block mb-2">Title</label>
                                        <input type="text" name="title" id="modal-title" value="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="description" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                                        <textarea name="description" id="modal-description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" rows="2" required></textarea>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                                        <input type="file" name="image" id="modal-image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" accept="image/*">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="video" class="text-sm font-medium text-gray-900 block mb-2">Video</label>
                                        <input type="file" name="video" id="modal-video" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" accept="video/*">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="social-media-link" class="text-sm font-medium text-gray-900 block mb-2">Social Media Link</label>
                                        <input type="url" name="social_media_link" id="modal-social-media-link" value="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="author_id" class="text-sm font-medium text-gray-900 block mb-2">Authors</label>
                                        <select name="author_id" id="modal-author-id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                                            @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="items-center p-6 border-t border-gray-200 rounded-b">
                                <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>

            <!-- Add User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm"
                id="add-user-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-2 border-b rounded-t">
                            <h3 class="text-xl font-semibold">
                                Add More News
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="add-user-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-2 space-y-3">
                            <form action="{{ route('admin.category.store', ['id' => 1 ]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="title" class="text-sm font-medium text-gray-900 block mb-2">Title</label>
                                        <input type="text" name="title" id="title"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Enter title" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="description" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                                        <textarea name="description" id="description"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Enter description" rows="3" required></textarea>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                                        <input type="file" name="image" id="image"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            accept="image/*" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="video" class="text-sm font-medium text-gray-900 block mb-2">Video</label>
                                        <input type="file" name="video" id="video"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            accept="video/*">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="social-media-link" class="text-sm font-medium text-gray-900 block mb-2">Social Media Link</label>
                                        <input type="url" name="social_media_link" id="social-media-link"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="https://example.com" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="author_id" class="text-sm font-medium text-gray-900 block mb-2">Authors</label>
                                        <select name="author_id" id="modal-author-id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                                            @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="items-center p-6 border-t border-gray-200 rounded-b">
                            <button
                                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Add Content</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal  -->

            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm"
                id="delete-user-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                onclick="closeDeleteModal()">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 pt-0 text-center">
                            <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete
                                this data?</h3>
                            <a href="{{ route('admin.category.destroy', [ 'id' => 1 ])}}?category_id={{ $items->id }}"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </a>
                            <a href="#"
                                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                onclick="closeDeleteModal()">
                                No, cancel
                            </a>

                        </div>
                    </div>
                </div>
            </div>





        </main>
    </div>
</x-admin-layout>



<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />