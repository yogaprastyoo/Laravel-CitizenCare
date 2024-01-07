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
    @include('layouts.includes.navbar-app')

    <div class="container mx-auto pt-10">
        {{ $slot }}
    </div>

</body>

</html>
