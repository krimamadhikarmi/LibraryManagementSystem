<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
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
