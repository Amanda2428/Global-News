<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>{{ config('app.name', 'Worldview Wave') }}</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="canonical" href="https://themesberg.com/product/tailwind-css/dashboard-windster">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />
    



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://demo.themesberg.com/windster/app.css">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>



</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal ">

    <!-- Navigation Header -->

    <nav id="header" class="bg-black fixed w-full z-10 top-0 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
            <div class="w-1/2 pl-2 md:pl-0">
                <a class="text-gray-50 text-base xl:text-xl no-underline hover:no-underline font-bold" href="{{ route('dashboard') }}">
                    Worldview Waves Admin
                </a>

            </div>

            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">
                    <div class="relative text-sm">
                        <button id="userButton" class="flex items-center focus:outline-none">
                        <img src="{{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : asset('images/default-profile.jpg') }}"
                            alt="User Profile Picture"
                            class="w-10 h-10 rounded-full object-cover mr-2">
                            <span class="hidden md:inline-block text-gray-50">Hi,  {{ Auth::user()->name }} </span>
                            <svg class="pl-2 h-2 fill-current text-white" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129">
                                <g>
                                    <path
                                        d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu"
                            class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li><a href="{{ route('profile.edit') }}"
                                        class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">My
                                        account</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <li><a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>

                    </div>
                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle"
                            class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto lg:block mt-2 lg:mt-0 bg-white z-20"
                id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <!-- Home -->
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('dashboard') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-gray-900 border-b-2 border-orange-600 hover:border-orange-600">
                            <i class="fas fa-home fa-fw mr-3 text-pink-600"></i><span
                                class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>

                    <!-- Manage Lists Dropdown -->
                    <li class="mr-6 my-2 md:my-0 relative">
                        <a href="#" id="adminListLink"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fas fa-users mr-3"></i><span class="pb-1 md:pb-0 text-sm">Manage Lists</span><i
                                class="fas fa-sort-down ml-2"></i>
                        </a>
                        <div id="adminDropdown"
                            class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <ul class="list-reset w p-2">
                                <li><a href="{{ route('admin.goToUserList') }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-user mr-2"></i>Users</a></li>
                                <li><a href="{{ route('admin.goToAdminList') }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-users-cog mr-2"></i>Admins</a></li>
                                <li><a href="{{ route('admin.goToAuthorList') }}" class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-user-edit mr-2"></i>Authors Listing</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="mr-6 my-2 md:my-0">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                            <i class="fas fa-chart-area fa-fw mr-3"></i><span
                                class="pb-1 md:pb-0 text-sm">Analytics</span>
                        </a>
                    </li>
                    <!-- Categories Dropdown -->
                    <li class="mr-6 my-2 md:my-0 relative">
                        <a href="#" id="categoriesLink"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                            <i class="fas fa-th-list mr-3"></i><span class="pb-1 md:pb-0 text-sm">Categories</span><i
                                class="fas fa-sort-down ml-2"></i>
                        </a>
                        <div id="categoriesDropdown"
                            class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <ul class="list-reset p-2">
                                <li><a href="{{ route('admin.goToWorldPage',['id' => 1]) }}" class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-globe-asia mr-2"></i>World</a></li>
                                <li><a href="{{ route('admin.goToSportPage',['id' => 2]) }}" class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-futbol mr-2"></i>Sport</a></li>
                                <li><a href="{{ route('admin.goToBusinessPage',['id' => 3]) }}" class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-briefcase mr-2"></i>Business</a></li>
                                <li><a href="{{ route('admin.goToEducationPage',['id' => 4]) }}" class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-book mr-2"></i>Education</a></li>
                                <li><a href="{{ route('admin.goToEntertainmentPage',['id' => 5]) }}" class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-film mr-2"></i>Entertainment</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('admin.goToComments') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                            <i class="fas fa-comments mr-2"></i></i><span class="pb-1 md:pb-0 text-sm">Comments  Manage</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('admin.goToCategoryTypes') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                            <i class="fas fa-bars mr-2"></i><span class="pb-1 md:pb-0 text-sm">Category Types
                                Manage</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('admin.goToViews') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                            <i class="fas fa-eye mr-2"></i></i><span class="pb-1 md:pb-0 text-sm">Views</span>
                        </a>
                    </li>
                </ul>

                
            </div>

        </div>
    </nav>


    <!--Container-->
    <div class="container w-full mx-auto pt-20 ">
        {{ $slot}}
    </div>
    <!--/container-->

    <footer class="bg-black border-t border-gray-400 shadow">
        <div class="container max-w-md mx-auto flex py-8">

            <div class="w-full mx-auto flex flex-wrap">
                <div class="flex w-full md:w-1/2 ">
                    <div class="px-8">
                        <h3 class="font-bold font-bold text-gray-50">About</h3>
                        <p class="py-4 text-gray-400 text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus
                            commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                        </p>
                    </div>
                </div>

                <div class="flex w-full md:w-1/2">
                    <div class="px-8">
                        <h3 class="font-bold font-bold text-gray-50">Social</h3>
                        <ul class="list-reset items-center text-sm pt-3">
                            <li>
                                <a class="inline-block text-gray-400 no-underline hover:text-gray-50 hover:underline py-1"
                                    href="#">Add social link</a>
                            </li>
                            <li>
                                <a class="inline-block text-gray-400 no-underline hover:text-gray-50 hover:underline py-1"
                                    href="#">Add social link</a>
                            </li>
                            <li>
                                <a class="inline-block text-gray-400 no-underline hover:text-gray-50 hover:underline py-1"
                                    href="#">Add social link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </footer>


    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var userMenuDiv = document.getElementById("userMenu");
        var userMenu = document.getElementById("userButton");

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //User Menu
            if (!checkParent(target, userMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, userMenu)) {
                    // click on the link
                    if (userMenuDiv.classList.contains("invisible")) {
                        userMenuDiv.classList.remove("invisible");
                    } else {
                        userMenuDiv.classList.add("invisible");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    userMenuDiv.classList.add("invisible");
                }
            }

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }

        // Manage Lists Dropdown Toggle
        document.getElementById('adminListLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('adminDropdown').classList.toggle('hidden');
        });

        // Categories Dropdown Toggle
        document.getElementById('categoriesLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('categoriesDropdown').classList.toggle('hidden');
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Add User Modal
        const addUserButton = document.querySelector('[data-modal-toggle="add-user-modal"]');
        const addUserModal = document.getElementById('add-user-modal');
        const addUserCloseButton = addUserModal.querySelector('[data-modal-toggle="add-user-modal"]');

        addUserButton.addEventListener('click', () => {
            addUserModal.classList.remove('hidden');
        });

        addUserCloseButton.addEventListener('click', () => {
            addUserModal.classList.add('hidden');
        });


    });
</script>
<script>
    function openModal(id, title, description, image, video, link, author_id) {
        // Set values of modal fields
        document.getElementById('modal-category-id').value = id;
        document.getElementById('modal-title').value = title;
        document.getElementById('modal-description').value = description;
        document.getElementById('modal-social-media-link').value = link;
        document.getElementById('modal-author-id').value = author_id;

        // Show the modal
        document.getElementById('user-modal').classList.remove('hidden');
    }

    function closeModal() {
        // Hide the modal\

        document.getElementById('user-modal').classList.add('hidden');
    }
</script>
<script>
    function openDeleteModal(id) {
        document.getElementById('modal-category-id').value = id;

        document.getElementById('delete-user-modal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-user-modal').classList.add('hidden');
    }
</script>

    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script> -->
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8e058c9b5aeb4933","version":"2024.10.5","r":1,"token":"3a2c60bab7654724a0f7e5946db4ea5a","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}'
        crossorigin="anonymous"></script>
</body>

</html>
