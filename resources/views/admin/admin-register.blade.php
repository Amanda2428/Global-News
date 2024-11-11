<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800">All Start With You!</h2>
        <form class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Enter your name">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" id="email" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Enter your email">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Enter your password">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Confrimed Password</label>
                <input type="password" id="password" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Confrimed your password">
            </div>
            <div class="relative inline-block text-left">
                <button id="dropdownButton" class="flex items-center bg-gray-800 text-white px-4 py-2 rounded focus:outline-none">
                    <span id="selectedOption">Select an option</span>
                    <svg class="ml-2 w-4 h-4 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>

                <div id="dropdownMenu" class="absolute mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg hidden">
                    <ul class="text-gray-800">
                        <li>
                            <button onclick="selectOption('Option 1')" class="w-full text-left px-4 py-2 hover:bg-gray-200 focus:bg-gray-200">Option 1</button>
                        </li>
                        <li>
                            <button onclick="selectOption('Option 2')" class="w-full text-left px-4 py-2 hover:bg-gray-200 focus:bg-gray-200">Option 2</button>
                        </li>
                        <li>
                            <button onclick="selectOption('Option 3')" class="w-full text-left px-4 py-2 hover:bg-gray-200 focus:bg-gray-200">Option 3</button>
                        </li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Create Admin</button>
        </form>
        <p class="text-sm text-center text-gray-600">

            <a href="#" class="font-medium text-blue-600 hover:underline">Admin Dashboard</a>
        </p>
    </div>


    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const selectedOption = document.getElementById('selectedOption');

        // Toggle dropdown visibility on button click
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Set selected option and close dropdown
        function selectOption(option) {
            selectedOption.textContent = option;
            dropdownMenu.classList.add('hidden');
        }

        // Close dropdown if clicked outside
        window.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

</body>

</html>