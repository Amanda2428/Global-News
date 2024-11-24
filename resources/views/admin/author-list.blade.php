<x-admin-layout>
    <div id="main-content" class="h-full w-full bg-gray-50 ">
        <main>

            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="mb-1 w-full">
                    <div class="mb-4">
                        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Authors</h1>
                    </div>
                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                        <form action="{{ route('admin.author.AuthorPagesearch') }}" method="GET">
                                <div class="mt-1 relative lg:w-64 xl:w-96">
                                    <!-- Search input field -->\
                                    <input type="text" name="query" id="categories-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="Search for World News with title" value="{{ request('query') }}">

                                    <!-- Submit button -->
                                    <button type="submit" class="hidden"></button>

                                    <!-- Cancel button -->
                                    <a href="{{ route('admin.goToAuthorList') }}" class="absolute right-2 top-2 bg-gray-300 text-gray-700 rounded px-4 py-1 text-sm hover:bg-gray-400">
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
                                Add Author
                            </button>

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
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Profile
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Email
                                        </th>

                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            bio
                                        </th>

                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            phone-number
                                        </th>

                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            address
                                        </th>
                                        <th scope="col" class="p-4">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if($authors->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center p-4 text-gray-500">
                                            No results found for "{{ isset($query) ? $query : '' }}".
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($authors as $info)
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-4 w-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                                                    class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                <label for="checkbox-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $info->id }}
                                        </td>
                                        <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                            <img class="h-20 w-20 rounded-full"
                                                src="{{ asset($info->profile ?? 'images/default-avatar.png') }}" alt="Author Avatar">
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $info->name }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $info->email }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ Str::limit($info->bio, 30, '...') }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $info->phone }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ Str::limit($info->address, 40, '...') }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap space-x-2">
                                            <button type="button" onclick="openUpdateModal('{{ $info->id }}', '{{ $info->profile }}', '{{ $info->name }}', '{{ $info->email }}', '{{ $info->phone }}', '{{ $info->bio }}', '{{ $info->address }}')" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-edit mr-2"></i>Edit Content
                                            </button>
                                            <!-- Button to open modal -->
                                            <button type="button" onclick="openModal('{{ $info->id }}')" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete Content
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


            <!-- Add User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm"
                id="add-user-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-2 border-b rounded-t">
                            <h3 class="text-xl font-semibold">
                                Add New Author
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
                            <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 gap-6">
                                    <!-- Profile Picture Upload -->
                                    <div class="col-span-1">
                                        <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                                        <input type="file" name="profile" id="profile"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            accept="image/*" required>
                                    </div>
                                    <!-- Name Field -->
                                    <div class="col-span-1">
                                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Bonnie" required>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="col-span-1">
                                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="example@company.com" required>
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="col-span-1">
                                        <label for="phone-number" class="text-sm font-medium text-gray-900 block mb-2">Phone Number</label>
                                        <input type="tel" name="phone" id="phone-number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="e.g. +1234567890" pattern="[+0-9]{1,15}" required>
                                    </div>

                                    <!-- Bio Field -->
                                    <div class="col-span-1">
                                        <label for="bio" class="text-sm font-medium text-gray-900 block mb-2">Bio</label>
                                        <input type="text" name="bio" id="bio"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Write a short bio" maxlength="150" required>
                                    </div>

                                    <!-- Address Field -->
                                    <div class="col-span-1">
                                        <label for="address" class="text-sm font-medium text-gray-900 block mb-2">Address</label>
                                        <textarea name="address" id="address"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Street, City, State, Zip Code" rows="3" required></textarea>
                                    </div>
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="items-center p-6 border-t border-gray-200 rounded-b">
                            <button
                                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Add Author</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

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
                        <form method="POST" action="{{ route('author.update') }}">
                            @csrf
                            <!-- @method('PUT') -->
                            <div class="p-2 space-y-3">
                                <input type="hidden" name="id" id="modal-author-id" value="">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Profile</label>
                                        <div class="flex items-center space-x-4">
                                            <img id="profile-preview" src="/images/default-profile.png" alt="Profile" class="w-12 h-12 rounded-full">
                                            <input type="file" name="image" id="modal-profile" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block p-2.5" accept="image/*">
                                        </div>

                                    </div>
                                    <div class="col-span-6">
                                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                                        <input type="text" name="name" id="modal-name" value="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                        <input type="email" name="email" id="modal-email"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="bio" class="text-sm font-medium text-gray-900 block mb-2">Bio</label>
                                        <input type="text" name="bio" id="modal-bio" value="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="phone-number" class="text-sm font-medium text-gray-900 block mb-2">Phone Number</label>
                                        <input type="tel" name="phone" id="modal-phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="e.g. +1234567890" pattern="[+0-9]{1,15}" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="address" class="text-sm font-medium text-gray-900 block mb-2">Address</label>
                                        <textarea name="address" id="modal-address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" rows="2" required></textarea>
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

            <!-- Delete User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm" id="delete-user-modal-{{ $info->id }}">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeModal('{{ $info->id }}')">
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
                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this author?</h3>
                            <a href="{{ route('author.destroy', ['id' => $info->id]) }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </a>
                            <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center" onclick="closeModal('{{ $info->id }}')">
                                No, cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>




        </main>
    </div>
    <script>
        function openUpdateModal(profile, id, name, email, phone, bio, address) {
            // Set values of modal fields
            document.getElementById('profile-preview').src = profile ? `/images/${profile}` : '/images/default-profile.jpg';
            document.getElementById('modal-author-id').value = id;
            document.getElementById('modal-name').value = name;
            document.getElementById('modal-email').value = email;
            document.getElementById('modal-bio').value = bio;
            document.getElementById('modal-phone').value = phone;

            document.getElementById('modal-address').value = address;

            // Show the modal
            document.getElementById('update-user-modal').classList.remove('hidden');
        }

        function closeUpdateModal() {
            // Hide the modal\

            document.getElementById('update-user-modal').classList.add('hidden');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function openModal(id) {
                // Show the modal for the specific author
                document.getElementById('delete-user-modal-' + id).classList.remove('hidden');
            }

            function closeModal(id) {
                // Close the modal for the specific author
                document.getElementById('delete-user-modal-' + id).classList.add('hidden');
            }

            // Attach the openModal and closeModal to global window object
            window.openModal = openModal;
            window.closeModal = closeModal;
        });
    </script>


</x-admin-layout>