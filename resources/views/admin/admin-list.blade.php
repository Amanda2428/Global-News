<x-admin-layout>
    <div id="main-content" class="h-full w-full bg-gray-50 ">
        <main>

            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="mb-1 w-full">
                    <div class="mb-4">
                        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Admin</h1>
                    </div>
                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <form action="{{ route('admin.adminPageSearch') }}" method="GET">
                                <div class="mt-1 relative lg:w-64 xl:w-96">
                                    <!-- Search input field -->
                                    <input type="text" name="query" id="categories-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="Search for Admin with Email" value="{{ request('query') }}">

                                    <!-- Submit button -->
                                    <button type="submit" class="hidden"></button>

                                    <!-- Cancel button -->
                                    <a href="{{ route('admin.goToAdminList') }}" class="absolute right-2 top-2 bg-gray-300 text-gray-700 rounded px-4 py-1 text-sm hover:bg-gray-400">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            </form>
                        </div>

                        <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                            @if (Auth::user()->owner == '1' )
                            <button type="button" data-modal-toggle="add-user-modal"
                                class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add Admin
                            </button>
                            @elseif(Auth::user()->owner == '0' )
                            <button type="button" data-modal-toggle="add-user-modal"
                                class="hidden w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add Admin
                            </button>
                            @endif
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
                                            Role
                                        </th>
                                        <th scope="col" class="p-4">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if($admins->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center p-4 text-gray-500">
                                            No results found for "{{ isset($query) ? $query : '' }}".
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($admins as $item )
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
                                        <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                            <img class="h-20 w-20 rounded-full"
                                                src="{{ $item->profile ? asset('storage/' . $item->profile) : asset('images/default-profile.jpg') }}" alt="Author Avatar">
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $item->name }}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            {{ $item->email }}
                                        </td>

                                        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                            @switch($item->category_type)
                                            @case(1)
                                            World Admin
                                            @break
                                            @case(2)
                                            Sport Admin
                                            @break
                                            @case(3)
                                            Business Admin
                                            @break
                                            @case(4)
                                            Education Admin
                                            @break
                                            @case(5)
                                            Entertainment Admin
                                            @break
                                            @default()
                                            All Admins
                                            @break
                                            @endswitch
                                        </td>

                                        <td class="p-4 whitespace-nowrap space-x-2">
                                            @if (Auth::user()->owner == '1' )
                                            <button type="button"
                                                onclick="openUpdateModal('{{ $item->id }}', '{{ $item->name }}', '{{ $item->email }}', '{{ $item->category_type }}')"
                                                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-edit mr-2"></i>Edit Admin
                                            </button>

                                            <button type="button" onclick="openAdminDeleteModal('{{ $item->id }}')" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete Admin
                                            </button>

                                            @elseif(Auth::user()->owner == '0')
                                            <button type="button"
                                                onclick="openUpdateModal('{{ $item->id }}', '{{ $item->name }}', '{{ $item->email }}', '{{ $item->category_type }}')"
                                                class="hidden text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-edit mr-2"></i>Edit Admin
                                            </button>
                                            <button type="button" onclick="openAdminDeleteModal('{{ $item->id }}')" class="hidden text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete Admin
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
                    <a href="{{ $admins->previousPageUrl() }}" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="{{ $admins->nextPageUrl() }}" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <span class="text-sm font-normal text-gray-500">Showing <span class="text-gray-900 font-semibold">{{ $admins->firstItem() }}-{{$admins->lastItem() }}</span> of <span class="text-gray-900 font-semibold">{{ $admins->total() }}</span></span>
                </div>
                <div class="flex items-center space-x-3">
                    @if ($admins->onFirstPage())
                    <span class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                        Previous
                    </span>
                    @else
                    <a href="{{ $admins->previousPageUrl() }}" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Previous
                    </a>
                    @endif
                    @if ($admins->hasMorePages())
                    <a href="{{ $admins->nextPageUrl() }}" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Next
                    </a>
                    @else
                    <span class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                        Next
                    </span>
                    @endif

                </div>
            </div>

            <!-- Add User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm"
                id="add-user-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">

                    <div class="bg-white rounded-lg shadow relative">

                        <div class="flex items-start justify-between p-2 border-b rounded-t">
                            <h3 class="text-xl font-semibold">
                                Add More Admins
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

                        <div class="p-2 space-y-3">
                            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-6 gap-4">
                                    <div class="col-span-6">
                                        <label for="name"
                                            class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Bonnie" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="email"
                                            class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="example@company.com" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Enter your password" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="confirm-password" class="text-sm font-medium text-gray-900 block mb-2">Confirm Password</label>
                                        <input type="password" name="confirm-password" id="confirm-password"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Re-enter your password" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="role" class="text-sm font-medium text-gray-900 block mb-2">Role</label>
                                        <select name="category_type" id="category_type" class="block w-full border border-gray-300 rounded-lg p-2.5">
                                            <option value="" disabled selected>Select Category Type</option>
                                            <option value="1">World Admin</option>
                                            <option value="2">Sport Admin</option>
                                            <option value="3">Business Admin</option>
                                            <option value="4">Education Admin</option>
                                            <option value="5">Entertainment Admin</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="items-center p-6 border-t border-gray-200 rounded-b">
                            <button
                                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Add Admin</button>
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
                            <h3 class="text-xl font-semibold">Edit Admin</h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeUpdateModal()">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form method="POST" action="{{ route('admin.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="p-2 space-y-3">
                                <!-- Hidden input for the category ID -->
                                <input type="hidden" name="id" id="modal-admin-id" value="">
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="col-span-6">
                                        <label for="name"
                                            class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                                        <input type="text" name="name" id="modal-admin-name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Bonnie" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="email"
                                            class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                        <input type="email" name="email" id="modal-admin-email"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="example@company.com" required>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="category_type" class="text-sm font-medium text-gray-900 block mb-2">Role</label>
                                        <select name="category_type" id="modal-admin-category-type" class="block w-full border border-gray-300 rounded-lg p-2.5">
                                            <option value="" disabled selected>Select Category Type</option>
                                            <option value="1">World Admin</option>
                                            <option value="2">Sport Admin</option>
                                            <option value="3">Business Admin</option>
                                            <option value="4">Education Admin</option>
                                            <option value="5">Entertainment Admin</option>
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

            @foreach ($admins as $item)
            <!-- Delete User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 backdrop-blur-sm" id="delete-user-modal-{{ $item->id }}">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative">
                        <div class="flex justify-end p-2">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeAdminDeleteModal('{{ $item->id }}')">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-6 pt-0 text-center">
                            <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this Admin?</h3>
                            <a href="{{ route('admin.destroy', ['id' => $item->id]) }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </a>
                            <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center" onclick="closeAdminDeleteModal('{{ $item->id }}')">
                                No, cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </main>
    </div>
    <script>
        function openUpdateModal(id, name, email, category_type) {
            console.log(id, name, email, category_type); // Debugging the values
            document.getElementById('modal-admin-id').value = id;
            document.getElementById('modal-admin-name').value = name;
            document.getElementById('modal-admin-email').value = email;
            var select = document.getElementById('modal-admin-category-type');
            for (var i = 0; i < select.options.length; i++) {
                if (select.options[i].value == category_type) {
                    select.selectedIndex = i;
                    break;
                }
            }
            document.getElementById('update-user-modal').classList.remove('hidden');
        }

        function closeUpdateModal() {
            // Hide the modal
            document.getElementById('update-user-modal').classList.add('hidden');
        }
    </script>
    <script>
    function openAdminDeleteModal(id) {
        const modal = document.getElementById('delete-user-modal-' + id);
        if (modal) {
            modal.classList.remove('hidden');
        } else {
            console.error('Modal with ID delete-user-modal-' + id + ' not found.');
        }
    }

    function closeAdminDeleteModal(id) {
        const modal = document.getElementById('delete-user-modal-' + id);
        if (modal) {
            modal.classList.add('hidden');
        }
    }
</script>


</x-admin-layout>