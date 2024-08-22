<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Dashboard</title>
</head>

<body>
    @extends('admin.layout.navbar')
    @extends('admin.layout.sidebar')
    <div class="p-4 sm:ml-64 mt-20">
        @yield('container')
    </div>
</body>

</html>
