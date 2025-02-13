<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

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
            <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
        </div>

        <nav class="flex-1 overflow-y-auto p-4">
            <div class="space-y-2">
                <a href="/admin/dashboard"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-home w-5"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="/admin/products"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-box w-5"></i>
                    <span class="ml-3">Products</span>
                </a>
                <a href="/admin/orders" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-shopping-cart w-5"></i>
                    <span class="ml-3">Orders</span>
                </a>
                <a href="/admin/customers"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-3">Customers</span>
                </a>
            </div>

            <!-- Logout button in sidebar -->
            <div class="mt-auto pt-4 border-t border-gray-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="ml-3">Logout</span>
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
                        <form action="{{ route('logout') }}" method="POST" class="ml-4">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

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
                    <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
                </div>
                <nav class="flex-1 px-4 space-y-2">
                    <a href="/admin/dashboard"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-home w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="/admin/products"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-box w-5"></i>
                        <span class="ml-3">Products</span>
                    </a>
                    <a href="/admin/orders"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-shopping-cart w-5"></i>
                        <span class="ml-3">Orders</span>
                    </a>
                    <a href="/admin/customers"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-3">Customers</span>
                    </a>
                </nav>

                <!-- Logout button in mobile sidebar -->
                <div class="px-4 py-4 border-t border-gray-200">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-lg flex items-center justify-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
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
