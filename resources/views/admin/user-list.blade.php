<x-admin-layout>
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">


        <div class="flex flex-row flex-wrap flex-grow mt-2">


            <div class="w-full p-3">
                <!--Table Card-->
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-2">
                        <h5 class="font-bold uppercase text-gray-600">User Table</h5>
                    </div>

                    <table class="table-fixed min-w-full divide-y divide-gray-200 bg-white border rounded shadow">

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
                                    Name
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Email
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Action
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
                                <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://demo.themesberg.com/windster/images/users/neil-sims.png"
                                        alt="Neil Sims avatar">
                                    <div class="text-sm font-normal text-gray-500">
                                        <div class="text-base font-semibold text-gray-900">Neil Sims</div>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                    Front-end developer</td>
                                <td class="p-4 whitespace-nowrap text-base font-normal text-gray-900">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                        Active
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap space-x-2">
                                    <button type="button" data-modal-toggle="delete-user-modal"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Delete user
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--/Table Card-->

            </div>


        </div>

        <!--/ Console Content-->

    </div>
</x-admin-layout>