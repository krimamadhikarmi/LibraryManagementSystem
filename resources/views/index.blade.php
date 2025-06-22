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

    <x-userHeader />

    <div class="relative w-full h-64 md:h-96 overflow-hidden">
        <img src="{{ asset('img/background.jpg') }}" alt="Library Header" class="w-full h-full object-cover">

        <div class="absolute inset-0  bg-opacity-50 flex flex-col items-center justify-center px-4 text-center">
            <h1 class="text-white text-3xl md:text-5xl font-extrabold drop-shadow-lg mb-4">
                Welcome to the Library
            </h1>
            <p class="text-gray-200 text-lg md:text-xl max-w-2xl mb-6 drop-shadow-md">
                Discover thousands of books and explore your passion for knowledge.
            </p>
          
        </div>
    </div>

    {{-- @include('home.category') --}}
    @include('home.book')
    {{-- <livewire:book-user-display/> --}}

</body>

</html>
