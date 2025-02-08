<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <nav class="bg-blue-600 p-4 flex justify-between items-center">
        <h1 class="text-white text-xl font-bold">Admin Dashboard</h1>
        <div class="text-white">
            Welcome, <strong>{{ Auth::user()->name }}</strong>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="ml-4 bg-red-500 px-3 py-1 rounded">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto mt-10 p-6 bg-white shadow-md rounded">
        @yield('content')
    </div>

</body>

</html>
