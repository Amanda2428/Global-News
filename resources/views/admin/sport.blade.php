<x-admin-layout>
    <div id="main-content" class="h-full w-full bg-gray-50 ">
        <main>

            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="mb-1 w-full">
                    <div class="mb-4">
                        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Create Sport News</h1>
                    </div>
                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <form class="lg:pr-3" action="#" method="GET">
                                <label for="users-search" class="sr-only">Search</label>
                                <div class="mt-1 relative lg:w-64 xl:w-96">
                                    <input type="text" name="email" id="users-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="Search for Sport News">
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
                                Add More News
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
                            <th scope="col" class="p-4">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr class="hover:bg-gray-100">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                    <label for="checkbox-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">1</td>
                            <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                <img class="h-30 w-30 "
                                    src="https://demo.themesberg.com/windster/images/users/neil-sims.png"
                                    alt="Neil Sims avatar">
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                <video class="h-30 w-30" controls>
                                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">Sample Title</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">This is a sample description for the content.</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                <a href="https://www.example.com" target="_blank">https://www.example.com</a>
                            </td>
                            <td class="p-4 whitespace-nowrap space-x-2">
                                <button type="button" data-modal-toggle="user-modal"
                                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Edit Content
                                </button>
                                <button type="button" data-modal-toggle="delete-user-modal"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Delete Content
                                </button>
                            </td>
                        </tr>

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
                        <svg class="-ml-1 mr-1 h-5 w-5"" fill=" currentColor" viewBox="0 0 20 20"
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

            <!-- Edit User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
                id="user-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold">
                                Edit New Data
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="user-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form action="#">
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
                                        <input type="url" name="social-media-link" id="social-media-link"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="https://example.com" required>
                                    </div>
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="items-center p-6 border-t border-gray-200 rounded-b">
                            <button
                                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Save all</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
                id="add-user-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5 border-b rounded-t">
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
                        <div class="p-6 space-y-6">
                            <form action="#">
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
                                        <input type="url" name="social-media-link" id="social-media-link"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="https://example.com" required>
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

            <!-- Delete User Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
                id="delete-user-modal">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="delete-user-modal">
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
                            <a href="#"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </a>
                            <a href="#"
                                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                data-modal-toggle="delete-user-modal">
                                No, cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-admin-layout>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://cdn.filesizejs.com/filesize.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />