<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Admin - Book List</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <x-adminHeader />

    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold">Books</h1>
            <a href="{{ route('book.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-300 shadow">
                Add Book
            </a>
        </div>

        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded mb-6">
                <span class="font-semibold">Success:</span> {{ session('success') }}
            </div>
        @endif

        <livewire:book-table />
    </div>
</body>

</html>
