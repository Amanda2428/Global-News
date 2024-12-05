<x-admin-layout>
    <div id="main-content" class="h-full w-full bg-gray-50 ">
        <main>

            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="mb-1 w-full">
                    <div class="mb-4">
                        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Category Types</h1>
                    </div>
                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <form action="{{ route('admin.CategoryTypePagesearch') }}" method="GET">
                                <div class="mt-1 relative lg:w-64 xl:w-96">
                                    <!-- Search input field -->
                                    <input type="text" name="query" id="categories-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="Search for Category Types with name" value="{{ request('query') }}">

                                    <!-- Submit button -->
                                    <button type="submit" class="hidden"></button>

                                    <!-- Cancel button -->
                                    <a href="{{ route('admin.goToCategoryTypes') }}" class="absolute right-2 top-2 bg-gray-300 text-gray-700 rounded px-4 py-1 text-sm hover:bg-gray-400">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            </form>
                        </div>
                        <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                            <button type="button" data-modal-toggle="add-user-modal"
                                class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add Category Types
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ">
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
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase text-center align-middle">
                                            Category Types Name
                                        </th>

                                        <th scope="col" class="p-4 text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class=" bg-white divide-y divide-gray-200">
                                    @if($category_types->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center p-4 text-gray-500">
                                            No results found for "{{ isset($query) ? $query : '' }}" .
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($category_types as $item )
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-4 w-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                                                    class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                <label for="checkbox-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $item->id }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 text-center align-middle">
                                            {{ $item->name }}
                                        </td>

                                        <td class="p-4 whitespace-nowrap space-x-2 text-right">
                                            <button type="button" onclick="openUpdateModal('{{ $item->id }}', '{{ $item->name }}')" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-edit mr-2"></i>Edit Type
                                            </button>
                                            <button type="button" onclick="openingModal('{{ $item->id }}')"
                                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete Type
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




            <!-- Delete User Modal -->
            @foreach ($category_types as $item )
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm"
                id="delete-user-modal-{{ $item->id }}">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeingModal('{{ $item->id }}')">
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
                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this Catgory Type?</h3>
                            <a href="{{ route('category-types.destroy', ['id' => $item->id]) }}"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </a>

                            <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center" onclick="closeingModal('{{ $item->id }}')">
                                No, cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Edit User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm" id="update-user-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto ">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold">Edit Content</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeUpdateModal()">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form method="POST" action="{{ route('category-types.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="p-2 space-y-3">
                                <!-- Hidden input for the category ID -->
                                <input type="hidden" name="id" id="modal-category-id" value="">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category-type-name" class="text-sm font-medium text-gray-900 block mb-2">Category Types Name</label>
                                        <input type="text" name="category-type-name" id="category-type-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter category type name" required>
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
                            <form action="{{ route('category-types.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category-type-name" class="text-sm font-medium text-gray-900 block mb-2">Category Types Name</label>
                                        <input type="text" name="category-type-name" id="category-type-name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Enter category type name" required>
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


        </main>
    </div>

    <script>
        function openUpdateModal(id, name) {
            // Set values of modal fields
            document.getElementById('modal-category-id').value = id; // Set the category ID
            document.getElementById('category-type-name').value = name; // Set the category name

            // Show the modal
            document.getElementById('update-user-modal').classList.remove('hidden');
        }

        function closeUpdateModal() {
            // Hide the modal
            document.getElementById('update-user-modal').classList.add('hidden');
        }
    </script>

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