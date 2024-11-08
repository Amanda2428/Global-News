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
        <h2 class="text-2xl font-bold text-center text-gray-800">Your Social Campaigns</h2>
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
            <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Sign Up</button>
        </form>
        <p class="text-sm text-center text-gray-600">
            Already have an Account? 
            <a href="#" class="font-medium text-blue-600 hover:underline">Sign In</a>
        </p>
    </div>

</body>
</html>
