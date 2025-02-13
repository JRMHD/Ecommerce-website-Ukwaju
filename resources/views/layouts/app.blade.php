<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Sidebar for larger screens -->
    <div class="fixed hidden lg:flex flex-col w-64 h-screen bg-white border-r border-gray-200">
        <div class="flex items-center justify-center h-16 border-b border-gray-200">
            <img src="{{ asset('assets/images/logo/01.png') }}" alt="{{ config('app.name', 'Laravel') }}"
                class="h-10 object-contain">
        </div>

        <nav class="flex-1 overflow-y-auto p-4">
            <div class="space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-home w-5"></i>
                    <span class="ml-3">Dashboard</span>
                </a>

                <a href="{{ route('user.orders.index') }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-shopping-bag w-5"></i>
                    <span class="ml-3">My Orders</span>
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-user w-5"></i>
                    <span class="ml-3">Profile</span>
                </a>
            </div>

            <!-- Logout button in sidebar -->
            <div class="mt-auto pt-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="ml-3">Log Out</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Main content -->
    <div class="lg:ml-64">
        <!-- Top navbar -->
        <nav class="bg-white border-b border-gray-200">
            <div class="px-4 mx-auto">
                <div class="flex items-center justify-between h-16">
                    <!-- Mobile menu button -->
                    <button type="button" id="mobile-menu-button" class="lg:hidden text-gray-500 hover:text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <!-- Right navbar items -->
                    <div class="flex items-center space-x-4">
                        <!-- Welcome message and user info -->
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 mr-3">Welcome,
                                {{ Auth::user()->name }}</span>
                            <img class="h-8 w-8 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                                alt="Profile">
                        </div>

                        <!-- Logout button in navbar -->
                        <form method="POST" action="{{ route('logout') }}" class="ml-4">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page content -->
        <main class="p-6">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile sidebar -->
    <div id="mobile-sidebar" class="fixed inset-0 z-40 lg:hidden hidden">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

        <!-- Sidebar panel -->
        <div class="relative flex flex-col w-72 max-w-xs bg-white h-full">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button id="close-sidebar-button" type="button"
                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full">
                    <i class="fas fa-times text-white text-2xl"></i>
                </button>
            </div>

            <!-- Mobile sidebar content -->
            <div class="flex-1 h-full pt-5 pb-4 flex flex-col">
                <div class="flex-shrink-0 flex items-center px-4 mb-5">
                    <img src="{{ asset('assets/images/logo/01.png') }}" alt="{{ config('app.name', 'Laravel') }}"
                        class="h-8 w-auto object-contain">
                </div>
                <nav class="flex-1 px-4 space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-home w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-user w-5"></i>
                        <span class="ml-3">Profile</span>
                    </a>
                    <a href="{{ route('user.orders.index') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-shopping-bag w-5"></i>
                        <span class="ml-3">My Orders</span>
                    </a>
                </nav>

                <!-- Logout button in mobile sidebar -->
                <div class="px-4 py-4 border-t border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-lg flex items-center justify-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for mobile menu toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-button');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const closeSidebarBtn = document.getElementById('close-sidebar-button');

            function toggleMobileMenu() {
                mobileSidebar.classList.toggle('hidden');
            }

            mobileMenuBtn.addEventListener('click', toggleMobileMenu);
            closeSidebarBtn.addEventListener('click', toggleMobileMenu);

            // Close mobile menu when clicking overlay
            document.addEventListener('click', function(event) {
                if (!mobileSidebar.contains(event.target) &&
                    !mobileMenuBtn.contains(event.target) &&
                    !mobileSidebar.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            });
        });
    </script>
</body>

</html>
