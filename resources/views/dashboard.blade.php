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
                            <h3 class="font-bold text-3xl">{{App\Models\CategoryType::count()}}  <i class="fas fa-exchange-alt text-indigo-600"></i></h3>
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
                <!--Graph Card-->
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                    </div>
                    <div class="p-5">
                        <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                        <script>
                            new Chart(document.getElementById("chartjs-7"), {
                                "type": "bar",
                                "data": {
                                    "labels": ["January", "February", "March", "April"],
                                    "datasets": [{
                                        "label": "Page Impressions",
                                        "data": [10, 20, 30, 40],
                                        "borderColor": "rgb(255, 99, 132)",
                                        "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                    }, {
                                        "label": "Adsense Clicks",
                                        "data": [5, 15, 10, 30],
                                        "type": "line",
                                        "fill": false,
                                        "borderColor": "rgb(54, 162, 235)"
                                    }]
                                },
                                "options": {
                                    "scales": {
                                        "yAxes": [{
                                            "ticks": {
                                                "beginAtZero": true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <!--/Graph Card-->
            </div>

            <div class="w-full md:w-1/2 p-3">
                <!--Graph Card-->
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                    </div>
                    <div class="p-5">
                        <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                        <script>
                            new Chart(document.getElementById("chartjs-0"), {
                                "type": "line",
                                "data": {
                                    "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                    "datasets": [{
                                        "label": "Views",
                                        "data": [65, 59, 80, 81, 56, 55, 40],
                                        "fill": false,
                                        "borderColor": "rgb(75, 192, 192)",
                                        "lineTension": 0.1
                                    }]
                                },
                                "options": {}
                            });
                        </script>
                    </div>
                </div>
                <!--/Graph Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Graph Card-->
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                    </div>
                    <div class="p-5">
                        <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                        <script>
                            new Chart(document.getElementById("chartjs-1"), {
                                "type": "bar",
                                "data": {
                                    "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                    "datasets": [{
                                        "label": "Likes",
                                        "data": [65, 59, 80, 81, 56, 55, 40],
                                        "fill": false,
                                        "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                                            "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)",
                                            "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                                        ],
                                        "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                                            "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
                                            "rgb(201, 203, 207)"
                                        ],
                                        "borderWidth": 1
                                    }]
                                },
                                "options": {
                                    "scales": {
                                        "yAxes": [{
                                            "ticks": {
                                                "beginAtZero": true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <!--/Graph Card-->
            </div>



            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Template Card-->
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Template</h5>
                    </div>
                    <div class="p-5">

                    </div>
                </div>
                <!--/Template Card-->
            </div>

            <div class="w-full p-3">
                <!--Table Card-->
                <div id="main-content" class="h-full w-full bg-gray-50 ">


                    <div
                        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                        <div class="mb-1 w-full">
                            <div class="mb-4">
                                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 text-center">All User</h1>
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
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="https://demo.themesberg.com/windster/images/users/neil-sims.png"
                                                        alt="Neil Sims avatar">
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



                </div>
                <!--/Table Card-->

            </div>


        </div>

        <!--/ Console Content-->

    </div>
</x-admin-layout>