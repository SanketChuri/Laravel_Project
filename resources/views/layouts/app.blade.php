<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">
        <h1 class="text-3xl font-bold mb-4">📚 Library System</h1>
        <hr class="mb-6">

        @yield('content')
    </div>
</body>
</html>