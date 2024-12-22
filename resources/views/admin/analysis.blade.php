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
            <div class="w-full md:w-1/2 p-3">
                <!-- User Increase -->
                <div class="bg-white border rounded shadow p-5">
                    <h6 class="font-bold uppercase text-gray-600 mb-3">User Increase</h6>
                    <canvas id="user-increase-chart" class="chartjs"></canvas>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-3">
                <!-- Authors in Category Type -->
                <div class="bg-white border rounded shadow p-5">
                    <h6 class="font-bold uppercase text-gray-600 mb-3">Authors in Category Type</h6>
                    <canvas id="authors-category-type-chart" class="chartjs"></canvas>
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Function to handle fetch errors
                    const handleError = (error) => console.error('Error fetching data:', error);

                    // Function to generate random colors for charts
                    const getRandomColor = () => {
                        return `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.6)`;
                    };

                    // User Increase Chart
                    fetch('/api/user-increase')
                        .then(response => response.json())
                        .then(data => {
                            const ctx = document.getElementById('user-increase-chart').getContext('2d');
                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: data.dates,
                                    datasets: [{
                                        label: 'User Increase Over Time',
                                        data: data.users,
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderWidth: 2,
                                        fill: true,
                                    }]
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
                        .catch(handleError);

                    // Authors in Category Type Chart
                    fetch('/api/authors-category-type')
                        .then(response => response.json())
                        .then(data => {
                            // Extract authors and unique category types
                            const authors = data.map(item => item.author);
                            const categoryTypes = [...new Set(data.flatMap(item => Object.keys(item.category_counts)))];

                            // Generate datasets for each category type
                            const datasets = categoryTypes.map(type => ({
                                label: type,
                                data: data.map(item => item.category_counts[type] || 0), // Default to 0 if no data
                                backgroundColor: getRandomColor(),
                                borderColor: getRandomColor(),
                                borderWidth: 1,
                            }));

                            const ctx = document.getElementById('authors-category-type-chart').getContext('2d');
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: authors, // X-axis: Authors
                                    datasets: datasets, // Y-axis: Categories per type
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                    },
                                    scales: {
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Authors',
                                            },
                                        },
                                        y: {
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Number of Categories by Type',
                                            },
                                        },
                                    },
                                },
                            });
                        })
                        .catch(handleError);
                });
            </script>
</x-admin-layout>