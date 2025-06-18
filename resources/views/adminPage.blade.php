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

    <x-adminHeader />

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
        @foreach ($books as $book)
            <div class="border rounded-lg shadow-md p-4 bg-white">
                @if ($book->book_img)
                    <img src="{{ asset('storage/' . $book->book_img) }}" alt="{{ $book->title }}"
                        class="w-full h-48 object-cover mb-4 rounded">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 mb-4 rounded">
                        No Image
                    </div>
                @endif
                <h2 class="text-lg font-semibold mb-1">{{ $book->title }}</h2>
                <p class="text-sm text-gray-600 mb-1">Author: {{ $book->author_name }}</p>
                <p class="text-sm text-gray-600 mb-1">Price: Rs. {{ $book->price }}</p>
                <p class="text-sm text-gray-600 mb-2">Quantity: {{ $book->quantity }}</p>
                <p class="text-sm text-gray-700">{{ Str::limit($book->description, 100) }}</p>
            </div>
        @endforeach
    </div>


</body>

</html>
