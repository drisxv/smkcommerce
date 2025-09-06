<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - SMK Commerce</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <form method="POST" action="{{ route('login') }}" class="max-w-sm w-full bg-white p-6 rounded-lg shadow-md">
        @csrf

        <h2 class="text-4xl font-bold text-center text-gray-700 py-2 border-b-2">Admin SMK Commerce</h2>
        <h2 class="text-2xl font-bold text-center text-gray-700 my-2">Login</h2>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" required autofocus
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">Registrasi</a>
        </div>
        @if ($errors->any())
            <div class="my-4 text-red-600 text-center">
                {{ $errors->first() }}
            </div>
        @endif
        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Login
            </button>
        </div>
    </form>

</body>

</html>
