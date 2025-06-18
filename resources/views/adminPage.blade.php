<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @vite('resources/css/app.css')
    <title> Admin </title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body>

    <x-header>
        <x-slot:title>Admin</x-slot:title>
        <li><a href="#" class="text-blue-500 font-semibold">Home</a></li>
        <li><a href="#" class="hover:text-blue-500">List</a></li>
        <li><a href="#" class="hover:text-blue-500">Author</a></li>
        <li><a href="#" class="hover:text-blue-500">Log Out</a></li>
    </x-header>


</body>

</html>
