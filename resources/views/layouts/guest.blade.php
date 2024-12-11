<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Worldview Wave') }}</title>

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="resources\css\app.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />


    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="text-gray-700 pt-9 sm:pt-10">
    <!-- ========== { HEADER }==========  -->
    <header class="fixed top-0 left-0 right-0 z-50">
        <nav class="bg-black">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                <div class="flex justify-between">
                    <div class="mx-w-10 text-2xl font-bold capitalize text-white flex items-center">Worldview Wave</div>

                    <div class="flex flex-row">

                        <!-- nav menu -->
                        <ul class="navbar hidden lg:flex lg:flex-row text-gray-400 text-sm items-center font-bold">
                            <li class="active relative border-l border-gray-800 hover:bg-gray-900 ">
                                <a class="block py-3 px-6 border-b-2 border-transparent" href="{{route('user.home')}}">Home</a>
                            </li>
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 border-transparent" href="{{route('user.categories',['id' => 1])}}">World</a>
                            </li>
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 border-transparent" href="{{route('user.categories',['id' => 2])}}">Sport</a>
                            </li>
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 border-transparent" href="{{route('user.categories',['id' => 3])}}">Business</a>
                            </li>
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 border-transparent" href="{{route('user.categories',['id' => 4])}}">Education</a>
                            </li>
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 border-transparent" href="{{route('user.categories',['id' => 5])}}">Entertainment</a>
                            </li>
                            @if(Auth::check())
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <a href="{{ route('profile.edit') }}"
                                    class="block py-3 px-6 border-b-2 border-transparent">My
                                    account</a>
                            </li>
                            </li>
                            <!-- Logout Button -->
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block py-3 px-6 border-b-2 border-transparent">
                                        Logout<i class="ml-2 fas fa-sign-out-alt"></i>
                                    </button>
                                </form>
                            </li>


                            @else
                            <!-- Register Button -->
                            <li class="relative border-l border-gray-800 hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 border-transparent" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                        </ul>
                        <!-- Container for the dropdown search form -->
                        <div id="search-container" class="relative hidden">
                            <form id="search-form" action="{{ route('category.search') }}" method="GET" class="flex items-center">
                                <input type="text" name="query" id="search-query" placeholder="Search categories..." class="border p-2 rounded-l-md" />
                            </form>
                        </div>
                        <!-- Main search button that toggles the visibility of the form -->
                        <button id="search-button" class="py-2 px-5 bg-black text-white rounded-md hover:bg-gray-900 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                            </svg>
                        </button>
                        <button
                            id="mobile-menu-button"
                            class="hidden md:block py-2 px-5 bg-black text-white rounded-md hover:bg-gray-900 focus:outline-none sm:hidden md:hidden"
                            onclick="toggleMobileMenu()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path
                                    fill-rule="evenodd"
                                    d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header><!-- end header -->

    <!-- Mobile menu -->
    <div id="mobileMenu" class="side-area fixed w-full h-full inset-0 z-50 hidden">
        <!-- Background overlay -->
        <div class="back-menu fixed bg-gray-900 bg-opacity-70 w-full h-full inset-x-0 top-0"
            onclick="toggleMobileMenu()"></div>

        <!-- Mobile navbar -->
        <nav id="mobile-nav"
            class="side-menu flex flex-col right-0 w-64 fixed top-0 bg-white dark:bg-gray-800 h-full overflow-auto z-40">
            <!-- Close Button (beside the left of the white slide) -->
            <div class="cursor-pointer text-white absolute top-4 left-[-2.5rem] p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="open bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                    </path>
                </svg>
            </div>
            <!-- Navigation links -->
            <div class="mb-auto">
                <nav class="relative flex flex-wrap">
                    <div class="text-center py-4 w-full font-bold border-b border-gray-100">Worldview Wave</div>
                    <ul id="side-menu" class="w-full float-none flex flex-col">
                        <li class="relative">
                            <a href="#"
                                class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Home</a>
                        </li>
                        <li class="relative">
                            <a href="#"
                                class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Home</a>
                        </li>
                        <li class="relative">
                            <a href="#"
                                class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Home</a>
                        </li>
                        <li class="relative">
                            <a href="#"
                                class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Home</a>
                        </li>
                        <li class="relative">
                            <a href="#"
                                class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Home</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Copyright -->
            <div class="py-4 px-6 text-sm mt-6 text-center">
                <p>Copyright <a href="#">Worldview Waves</a> - All rights reserved</p>
            </div>
        </nav>
    </div>

    <main id="content">
        {{ $slot }}
    </main>
    <!-- =========={ FOOTER }==========  -->
    <footer class="bg-black text-gray-400">
        <!--Footer content-->
        <div id="footer-content" class="relative pt-8 xl:pt-16 pb-6 xl:pb-12">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 overflow-hidden">
                <div class="flex flex-wrap flex-row lg:justify-between -mx-3">
                    <div class="flex-shrink max-w-full w-full lg:w-2/5 px-3 lg:pr-16">
                        <div class="flex items-center mb-2">
                            <span class="text-3xl leading-normal mb-2 font-bold text-gray-100 mt-2">Worldview Waves</span>
                            <!-- <img src="src/img-min/logo.png" alt="LOGO"> -->
                        </div>
                        <p>Welcome! We are a passionate team committed to building remarkable newspapers, magazines, and news platforms.</p>
                        <ul class="space-x-3 mt-6 mb-6 Lg:mb-0">
                            <!--facebook-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                                    href="https://facebook.com" title="Facebook">
                                    <!-- <i class="fab fa-facebook fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <!--twitter-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                                    href="https://twitter.com" title="Twitter">
                                    <!-- <i class="fab fa-twitter fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <!--youtube-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                                    href="https://youtube.com" title="Youtube">
                                    <!-- <i class="fab fa-youtube fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M508.64,148.79c0-45-33.1-81.2-74-81.2C379.24,65,322.74,64,265,64H247c-57.6,0-114.2,1-169.6,3.6-40.8,0-73.9,36.4-73.9,81.4C1,184.59-.06,220.19,0,255.79q-.15,53.4,3.4,106.9c0,45,33.1,81.5,73.9,81.5,58.2,2.7,117.9,3.9,178.6,3.8q91.2.3,178.6-3.8c40.9,0,74-36.5,74-81.5,2.4-35.7,3.5-71.3,3.4-107Q512.24,202.29,508.64,148.79ZM207,353.89V157.39l145,98.2Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <!--instagram-->
                            <li class="inline-block">
                                <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                                    href="https://instagram.com" title="Instagram">
                                    <!-- <i class="fab fa-instagram fa-2x"></i> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z">
                                        </path>
                                        <path fill="currentColor"
                                            d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z">
                                        </path>
                                        <path fill="currentColor"
                                            d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z">
                                        </path>
                                    </svg>
                                </a>
                            </li><!--end instagram-->
                        </ul>
                    </div>
                    <div class="flex-shrink max-w-full w-full lg:w-3/5 px-3">
                        <div class="flex flex-wrap flex-row">
                            <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Product</h4>
                                <ul>
                                    <li class="py-1 hover:text-white"><a href="#">Landing</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Pages</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Sections</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Sign Up</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Login</a></li>
                                </ul>
                            </div>
                            <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Support</h4>
                                <ul>
                                    <li class="py-1 hover:text-white"><a href="#">Documentation</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Changelog</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Tools</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Icons</a></li>
                                </ul>
                            </div>
                            <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Includes</h4>
                                <ul>
                                    <li class="py-1 hover:text-white"><a href="#">Utilities</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Components</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Example code</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Updates</a></li>
                                </ul>
                            </div>
                            <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Legal</h4>
                                <ul>
                                    <li class="py-1 hover:text-white hover:text-white"><a href="#">Privacy
                                            Policy</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">Terms of Use</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">License</a></li>
                                    <li class="py-1 hover:text-white"><a href="#">GDPR</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Start footer copyright-->
        <div class="footer-dark">
            <div class="container py-4 border-t border-gray-200 border-opacity-10">
                <div class="row">
                    <div class="col-12 col-md text-center">
                        <p class="d-block my-3">Copyright © Worldview Waves | All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div><!--End footer copyright-->
    </footer><!-- end footer -->


    <!--Vendor js-->
    <script src="src/vendors/hc-sticky/dist/hc-sticky.js"></script>
    <script src="src/vendors/glightbox/dist/js/glightbox.min.js"></script>
    <script src="src/vendors/@splidejs/splide/dist/js/splide.min.js"></script>
    <script src="src/vendors/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js"></script>


    <script>
     function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.toggle('hidden');
}

    </script>

    <script>
        // Get the button
        const goToTopButton = document.getElementById("goToTop");

        // Show the button when scrolling down
        window.onscroll = function() {
            if (document.documentElement.scrollTop > 100) {
                goToTopButton.classList.remove("hidden");
            } else {
                goToTopButton.classList.add("hidden");
            }
        };

        // Scroll to the top when the button is clicked
        goToTopButton.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth", // Smooth scrolling effect
            });
        });
    </script>


    <script>
        const searchButton = document.getElementById('search-button');
        const searchContainer = document.getElementById('search-container');
        const searchQuery = document.getElementById('search-query');

        searchButton.addEventListener('click', function() {
            // Toggle the visibility of the search form (dropdown)
            searchContainer.classList.toggle('hidden');
        });

        const submitSearchButton = document.getElementById('submit-search');

        submitSearchButton.addEventListener('click', function() {
            const query = searchQuery.value; // Get the value from the input field

            // If query is not empty, submit the form
            if (query) {
                const form = document.getElementById('search-form');
                form.querySelector('#search-query').value = query; // Update query value in the form
                form.submit(); // Submit the form
            } else {
                alert('Please enter a search term');
            }
        });
    </script>

</body>

</html>