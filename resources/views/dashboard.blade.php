<x-admin-layout>
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

        <!--Console Content-->

        <div class="flex flex-wrap">

            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-pink-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Total Users</h5>
                            <h3 class="font-bold text-3xl"> {{ App\Models\User::where('role', 0)->count() }}<span class="ml-2 text-pink-500"><i class="fas fa-caret-up"></i></h3> </span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3  bg-yellow-500"><i class="fa-2x text-white fas fa-user-cog"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Total Admins</h5>
                            <h3 class="font-bold text-3xl"> {{ App\Models\User::where('role', 1)->count() }} <span class="text-yellow-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-blue-600"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Total Posts</h5>
                            <h3 class="font-bold text-3xl">{{App\Models\Category::count()}}
                                <i class="fas fa-exchange-alt text-blue-600"></i>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-green-600"><i class=" fa-2x text-white fas fa-user-edit"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Total Authors</h5>
                            <h3 class="font-bold text-3xl"> {{App\Models\Author::count()}}<span class="ml-2 text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Total Category Types</h5>
                            <h3 class="font-bold text-3xl">{{App\Models\CategoryType::count()}} <i class="fas fa-exchange-alt text-indigo-600"></i></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>



            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-yellow-600"><i class=" fa-2x text-white far fa-eye"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Total Views</h5>
                            <h3 class="font-bold text-3xl">{{App\Models\View::count()}} <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
        </div>

        <!--Divider-->
        <hr class="border-b-2 border-gray-400 my-8 mx-4">

        <div class="flex flex-row flex-wrap flex-grow mt-2">
            <div class="w-full md:w-1/2 p-3">
                <!-- Most-Viewed Categories -->
                <div class="bg-white border rounded shadow p-5">
                    <h6 class="font-bold uppercase text-gray-600 mb-3">Most-Viewed Categories</h6>
                    <canvas id="most-viewed-chart" class="chartjs"></canvas>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-3">
                <div class="bg-white border rounded shadow p-5">
                    <h6 class="font-bold uppercase text-gray-600 mb-3">Subscription Status</h6>
                    <canvas id="subscription-chart" class="chartjs"></canvas>
                </div>
            </div>






            <div class="w-full p-3">
                <!--Table Card-->
                <div id="main-content" class="h-full w-full bg-gray-50 ">


                    <div
                        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                        <div class="mb-1 w-full">
                            <div class="mb-4">
                                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 text-center">All Users</h1>
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
                                                    Subscribed
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @foreach ($users as $item)
                                            <tr class="hover:bg-gray-100">
                                                <td class="p-4 w-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-1" aria-describedby="checkbox-1"
                                                            type="checkbox"
                                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                                        <label for="checkbox-1" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                                    <img class="h-20 w-20 rounded-full"
                                                        src="{{ $item->profile ? asset('storage/' . $item->profile) : asset('images/default-profile.jpg') }}" alt="Author Avatar">
                                                </td>
                                                <td
                                                    class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                                    {{ $item->name }}
                                                </td>
                                                <td
                                                    class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                                    {{ $item->email }}
                                                </td>
                                                <td
                                                    class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                                    {{ $item->subscribed ? 'Yes' : 'No' }}
                                                </td>


                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <a href="{{ $users->previousPageUrl() }}" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="{{ $users->nextPageUrl() }}" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <span class="text-sm font-normal text-gray-500">Showing <span class="text-gray-900 font-semibold">{{ $users->firstItem() }}-{{ $users->lastItem() }}</span> of <span class="text-gray-900 font-semibold">{{ $users->total() }}</span></span>
                        </div>
                        <div class="flex items-center space-x-3">
                            @if ($users->onFirstPage())
                            <span class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                                Previous
                            </span>
                            @else
                            <a href="{{ $users->previousPageUrl() }}" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                                Previous
                            </a>
                            @endif
                            @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                                Next
                            </a>
                            @else
                            <span class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                                Next
                            </span>
                            @endif
                        </div>
                    </div>




                </div>
                <!--/Table Card-->

            </div>



        </div>


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/category-analytics')
                .then(response => response.json())
                .then(data => {
                    // Function to truncate text to 40 characters
                    function truncateText(text, maxLength = 15) {
                        return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
                    }

                    // Most-Viewed Categories Chart
                    new Chart(document.getElementById("most-viewed-chart"), {
                        type: "bar",
                        data: {
                            labels: data.mostViewedCategories.map(item => truncateText(item.title)),
                            datasets: [{
                                label: "Views",
                                data: data.mostViewedCategories.map(item => item.views_count),
                                backgroundColor: "rgba(75, 192, 192, 0.2)",
                                borderColor: "rgb(75, 192, 192)",
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                        },
                    });

                    // Most-Commented Categories Chart
                    new Chart(document.getElementById("most-commented-chart"), {
                        type: "bar",
                        data: {
                            labels: data.mostCommentedCategories.map(item => truncateText(item.title)),
                            datasets: [{
                                label: "Comments",
                                data: data.mostCommentedCategories.map(item => item.comments_count),
                                backgroundColor: "rgba(255, 99, 132, 0.2)",
                                borderColor: "rgb(255, 99, 132)",
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                        },
                    });

                    // Categories Count Per Type Chart
                    new Chart(document.getElementById("categories-type-chart"), {
                        type: "doughnut",
                        data: {
                            labels: data.categoriesPerType.map(item => truncateText(item.name)),
                            datasets: [{
                                label: "Categories",
                                data: data.categoriesPerType.map(item => item.categories_count),
                                backgroundColor: [
                                    "rgba(255, 99, 132, 0.2)",
                                    "rgba(54, 162, 235, 0.2)",
                                    "rgba(255, 206, 86, 0.2)",
                                    "rgba(75, 192, 192, 0.2)",
                                ],
                                borderColor: [
                                    "rgb(255, 99, 132)",
                                    "rgb(54, 162, 235)",
                                    "rgb(255, 206, 86)",
                                    "rgb(75, 192, 192)",
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                            },
                        },
                    });
                });
        });
    </script>
    <script>
        // Fetch subscription data from the server
        fetch('/api/subscription-stats')
            .then(response => response.json())
            .then(data => {
                // Create the chart
                new Chart(document.getElementById('subscription-chart'), {
                    type: 'pie', // You can also use 'bar' or 'doughnut'
                    data: {
                        labels: ['Subscribed (Yes)', 'Not Subscribed (No)'],
                        datasets: [{
                            label: 'User Subscriptions',
                            data: [data.yes, data.no],
                            backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(255, 99, 132, 0.2)"], // Colors for Yes and No
                            borderColor: [
                                "rgb(75, 192, 192)",
                                "rgb(255, 99, 132)"
                            ],
                            borderWidth: 1,
                        }],
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        },
                    },
                });
            })
            .catch(error => console.error('Error fetching subscription stats:', error));
    </script>
</x-admin-layout>