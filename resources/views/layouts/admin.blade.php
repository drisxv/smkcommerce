<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Toko</title>
    @vite(['resources/css/app.css'])

</head>

<body class="h-screen flex bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col">
        <!-- Logo / Header -->
        <div class="h-16 flex items-center justify-center border-b">
            <h1 class="text-xl font-bold text-blue-600">SIM Toko</h1>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">dashboard</span> Dashboard
            </a>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">shopping_cart</span> Orders
            </a>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">people</span> Users
            </a>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">settings</span> Settings
            </a>
        </nav>

        <!-- Footer -->
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Logout</button>
            </form>
        @endauth
    </aside>

    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</body>

</html>
