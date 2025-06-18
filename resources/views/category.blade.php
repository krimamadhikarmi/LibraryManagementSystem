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

    <div class="m-12">
        <h1 class="font-bold text-xl m-12">Category</h1>
        @if (session()->has('success'))
            <div class="text-red-500">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <label>Category Name</label>
            <input type="text" name="category_name" placeholder="Enter the category..."
                class="border-black rounded-sm" />
            <input type="submit" name="Submit" class="bg-sky-400 p-2 rounded-lg" />
        </form>
        @include('category.categoryTable')
    </div>
</body>

</html>
