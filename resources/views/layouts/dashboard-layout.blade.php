<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | CitizenCare</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-gray-900">
    @include('layouts.includes.navbar-dashboard')
    @include('layouts.includes.sidebar-dashboard')

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14 max-w-4xl mx-auto">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
