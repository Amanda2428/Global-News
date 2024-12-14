<x-admin-layout>
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

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

            <div class="w-full md:w-1/2 p-3">
                <!-- Categories Count Per Type -->
                <div class="bg-white border rounded shadow p-5">
                    <h6 class="font-bold uppercase text-gray-600 mb-3">Categories Count Per Type</h6>
                    <canvas id="categories-type-chart" class="chartjs"></canvas>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-3">
                <!-- Most-Commented Categories -->
                <div class="bg-white border rounded shadow p-5">
                    <h6 class="font-bold uppercase text-gray-600 mb-3">Most-Commented Categories</h6>
                    <canvas id="most-commented-chart" class="chartjs"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/category-analytics')
                .then(response => response.json())
                .then(data => {
                    // Most-Viewed Categories Chart
                    new Chart(document.getElementById("most-viewed-chart"), {
                        type: "bar",
                        data: {
                            labels: data.mostViewedCategories.map(item => item.title),
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
                            labels: data.mostCommentedCategories.map(item => item.title),
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
                            labels: data.categoriesPerType.map(item => item.name),
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