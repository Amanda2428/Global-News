<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Worldview Waves') }}</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="canonical" href="https://themesberg.com/product/tailwind-css/dashboard-windster">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />

    <style>
        /* Style for the dropdowns */
        #adminDropdown,
        #categoriesDropdown {
            width: 100%;
            z-index: 50;
        }

        .hidden {
            display: none;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }


        .list-reset li a {
            width: 100%;
        }
    </style>


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
                            <span class="hidden md:inline-block text-gray-50">Hi, {{ Auth::user()->name }} </span>
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
                            class="absolute left-0 mt-2 w-full lg:w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <ul class="list-reset w-full">
                                <li><a href="{{ route('admin.goToUserList') }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-user mr-2"></i>Users</a></li>
                                <li><a href="{{ route('admin.goToAdminList') }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-users-cog mr-2"></i>Admins</a></li>
                                <li><a href="{{ route('admin.goToAuthorList') }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-user-edit mr-2"></i>Authors</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{route('admin.goToAnalysis') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                            <i class="fas fa-chart-area fa-fw mr-3"></i><span
                                class="pb-1 md:pb-0 text-sm">Analysis</span>
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
                            class="absolute left-5 mt-2 w-full lg:w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <ul class="list-reset w-full">
                                <li><a href="{{ route('admin.goToWorldPage',['id' => 1]) }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-globe-asia mr-2"></i>World</a></li>
                                <li><a href="{{ route('admin.goToSportPage',['id' => 2]) }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-futbol mr-2"></i>Sport</a></li>
                                <li><a href="{{ route('admin.goToBusinessPage',['id' => 3]) }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-briefcase mr-2"></i>Business</a></li>
                                <li><a href="{{ route('admin.goToEducationPage',['id' => 4]) }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-book mr-2"></i>Education</a></li>
                                <li><a href="{{ route('admin.goToEntertainmentPage',['id' => 5]) }}"
                                        class="block py-1 px-2 text-gray-700 hover:bg-gray-200"><i
                                            class="fas fa-film mr-2"></i>Entertain</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('admin.goToComments') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                            <i class="fas fa-comments mr-2"></i></i><span class="pb-1 md:pb-0 text-sm">Comments Manage</span>
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
    <!-- =========={ FOOTER }==========  -->
    <footer class="bg-black text-gray-400 ">
        <!--Footer content-->
        <div id="footer-content" class="relative pt-8 xl:pt-16 pb-6 xl:pb-12">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 overflow-hidden">
                <div class="flex flex-wrap flex-row lg:justify-between -mx-3">
                    <div class="flex-shrink max-w-full w-full lg:w-2/5 px-3 lg:pr-16">
                        <div class="flex items-center mb-2">
                            <span class="text-3xl leading-normal mb-2 font-bold text-gray-100 mt-2">Worldview Waves</span>
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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 items-start">
                            <!-- Product Column -->
                            <div>
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Product</h4>
                                <ul>
                                    <li class="py-1 hover:text-white"><a href="{{route('user.home')}}">Landing</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{route('register')}}">Register</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{route('login')}}">Log in</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{route('password.request')}}">Forget Password</a></li>
                                </ul>
                            </div>

                            <!-- Users Site Column 1 -->
                            <div>
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">User Mangement</h4>
                                <ul>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToUserList') }}">User List</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToAdminList') }}">Admin List</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToAuthorList') }}">Author List</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{route('admin.goToAnalysis') }}">Analysis</a></li>
                                </ul>
                            </div>

                            <!-- Admin Site Column 2 -->
                            <div>
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Admin Site</h4>
                                <ul>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToWorldPage',['id' => 1]) }}">World</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToSportPage',['id' => 2]) }}">Sports</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToBusinessPage',['id' => 3]) }}">Business</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToEducationPage',['id' => 4]) }}">Education</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToEntertainmentPage',['id' => 5]) }}">Entertainment</a></li>
                                </ul>
                            </div>

                            <!-- Legal Column -->
                            <div>
                                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Others</h4>
                                <ul>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToComments') }}">Comments</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToCategoryTypes') }}">Category Types</a></li>
                                    <li class="py-1 hover:text-white"><a href="{{ route('admin.goToViews') }}">Views</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Start footer copyright-->
        <div class="footer-dark ">
            <div class="container py-4 border-t border-gray-200 border-opacity-10">
                <div class="row">
                    <div class="col-12 col-md text-center">
                        <p class="d-block my-3">Copyright © Worldview Waves | All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div><!--End footer copyright-->
    </footer><!-- end footer -->


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
        // Open modal and populate fields with data
        function openModal(id, title, description, image, video, social_media_link, author_id) {
            // Set values for the modal inputs
            document.getElementById('modal-category-id').value = id;
            document.getElementById('modal-title').value = title;
            document.getElementById('modal-description').value = description;
            document.getElementById('modal-image').value = ''; // Reset image input (cannot set file input value with JS)
            document.getElementById('modal-video').value = ''; // Reset video input (cannot set file input value with JS)
            document.getElementById('modal-social-media-link').value = social_media_link;
            document.getElementById('modal-author-id').value = author_id;

            // Show the modal
            document.getElementById('user-modal').classList.remove('hidden');
        }

        // Close the modal
        function closeModal() {
            document.getElementById('user-modal').classList.add('hidden');
        }
    </script>
    <script>
        function openDeleteModal(categoryId) {
            const deleteRoute = "{{ route('admin.category.destroy') }}";
            const deleteLink = `${deleteRoute}?category_id=${categoryId}`;
            document.getElementById('modal-delete-link').setAttribute('href', deleteLink);

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