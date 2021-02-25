<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div id="app">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="z-10 bg-gray-800">
            <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!-- Icon when menu is closed. -->
                            <!--
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
                            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!-- Icon when menu is open. -->
                            <!--
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
                            <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                        <div class="flex items-center flex-shrink-0">
                            <img class="block w-auto h-8 lg:hidden"
                                src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                            <img class="hidden w-auto h-8 lg:block"
                                src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                                alt="Workflow">
                        </div>
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                @auth
                                    <a href="{{ route('tasks.index') }}"
                                        class="px-3 py-2 text-sm font-medium text-white rounded-md">Browse
                                        Task</a>
                                    <a href="{{ route('tasks.create') }}"
                                        class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Post</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <button
                            class="p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}"
                                        class="px-3 py-2 text-sm font-medium text-white rounded-md">
                                        Login</a>
                                @endif

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-3 py-2 text-sm font-medium text-white rounded-md">
                                        Register</a>
                                @endif
                            @else
                                <a href="{{ route('profile.index') }}"
                                    class="px-3 py-2 text-sm font-medium text-white rounded-md">
                                    {{ Auth::user()->name }}
                                </a>
                                <a href="{{ route('logout') }}"
                                    class="px-3 py-2 text-sm font-medium text-white rounded-md"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="block px-3 py-2 text-base font-medium text-white rounded-md">Dashboard</a>
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Team</a>
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Projects</a>
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Calendar</a>
        </div>
    </div>
    </nav>

    @if (isset($errors) && $errors->any())
        @foreach ($errors->all() as $error)
            <div class="relative w-1/2 px-6 py-4 m-auto mt-4 mb-4 text-white bg-red-500 border-0 rounded">
                <span class="inline-block mr-5 text-xl align-middle">
                    <i class="fas fa-bell"></i>
                </span>
                <span class="inline-block mr-8 align-middle">
                    <b class="capitalize">Error!</b> {{ $error }}
                </span>
            </div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div class="relative w-1/2 px-6 py-4 m-auto mt-4 mb-4 text-white bg-green-500 border-0 rounded">
            <span class="inline-block mr-5 text-xl align-middle">
                <i class="fas fa-bell"></i>
            </span>
            <span class="inline-block mr-8 align-middle">
                <b class="capitalize">Success!</b> {{ session()->get('success') }}
            </span>
            <button
                class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none">
                <span>×</span>
            </button>
        </div>
    @endif

    <main>
        @yield('content')
    </main>
    </div>
    @livewireScripts
</body>

</html>
