<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Library App</title>

</head>

<body class="antialiased bg-gray-100">

    <x-header>
        <x-slot:title>
            Library
        </x-slot:title>
        <li><a href="#" class="text-blue-500 font-semibold">Home</a></li>
        <li><a href="#" class="hover:text-blue-500">List</a></li>
        <li><a href="#" class="hover:text-blue-500">Author</a></li>
        <li><a href="#" class="hover:text-blue-500">Log Out</a></li>
        {{-- @include('home.book') --}}
    </x-header>
</body>

</html>
