<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiftie Web</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ URL('images/taylor.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

</head>

<body class="bg-white">

    <!--navbar starts here -->
    <!-- Main navigation container -->
    <nav class="relative flex w-full flex-wrap items-center justify-between py-2 bg-sky-500/75 shadow-lg lg:py-4 sticky top-0 fixed  left-0 w-full navbar"
        data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-3">
            <div>
                <a class="mx-2 my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
                    href="{{ route('home') }}">
                    <img class="mr-2" src="{{ URL('images/seagull.png') }}" style="height: 40px" alt="TE Logo"
                        loading="lazy" />
                </a>
            </div>

            <!-- Hamburger button for mobile view -->
            <button
                class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                type="button" data-te-collapse-init data-te-target="#navbarSupportedContent4"
                aria-controls="navbarSupportedContent4" aria-expanded="false" aria-label="Toggle navigation">
                <!-- Hamburger icon -->
                <span class="[&>svg]:w-7">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>

            <!-- Collapsible navbar container -->
            <div class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
                id="navbarSupportedContent4" data-te-collapse-item>
                <!-- Left links -->
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row" data-te-navbar-nav-ref>
                    <!-- Home link -->
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="self-center text-2xl font-semibold ">Swiftie Web</span>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <aside class="bg-slate-500 w-64 h-screen fixed left-0 overflow-y-auto sidebar">


        <div class="flex items-center pl-2.5 mt-6 mb-5">
            <img src="{{ URL('images/taylor.png') }}" class="w-15 h-10 mr-3 " alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap text-amber-500">Admin Panel</span>
        </div>
        <hr class="h-px mt-4 mb-4 bg-purple-900 border-0 dark:bg-gray-700">
        <ul class="ml-2">
            <a href="{{ route('blogs.adminIndex') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>


                <span class="ml-3">Blogs</span>
            </a>

        </ul>
    </aside>


    <div class="ml-64 p-4">
        @yield('adminContent')
    </div>



</body>

</html>
