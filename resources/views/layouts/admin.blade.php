<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Commerce</title>
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col md:flex-row h-screen">

    <!-- Sidebar -->
    <aside
        class="bg-white shadow-lg flex flex-col w-full md:w-64 md:h-screen md:flex-none fixed md:relative z-20 transform -translate-x-full md:translate-x-0 transition-transform duration-300"
        id="sidebar">
        <!-- Logo / Header -->
        <div class="h-16 flex items-center justify-between md:justify-center border-b px-4">
            <h1 class="text-xl font-bold text-blue-600">SMK Commerce</h1>
            <!-- Button untuk mobile toggle -->
            <button class="md:hidden text-gray-700" id="closeSidebar">
                <span class="material-icons">close</span>
            </button>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ url('admin/vendors') }}"
                class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">group_work</span> Vendors
            </a>
            <a href="{{ url('admin/users') }}" class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">people</span> Users
            </a>
            <a href="{{ url('admin/partnerships') }}"
                class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">article</span> Partnerships
            </a>
            <a href="{{ url('admin/settings') }}"
                class="flex items-center p-2 rounded-lg hover:bg-blue-100 text-gray-700">
                <span class="material-icons mr-3">settings</span> Settings
            </a>
        </nav>

        <!-- Footer -->
        @auth
            <form method="POST" action="{{ route('logout') }}" class="p-4">
                @csrf
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Logout</button>
            </form>
        @endauth
    </aside>

    <!-- Mobile toggle button -->
    <div class="md:hidden fixed top-4 left-4 z-30">
        <button id="openSidebar" class="text-gray-700">
            <span class="material-icons">menu</span>
        </button>
    </div>

    <!-- Main content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- Script untuk toggle sidebar mobile -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        openBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>

</body>

</html>
