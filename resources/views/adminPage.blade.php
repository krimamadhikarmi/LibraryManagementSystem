<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @vite('resources/css/app.css')
    <title>Admin Home Page</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <x-adminHeader />

    <livewire:book-stats />
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-700">All Books</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($books as $book)
                <div
                    class="bg-white border rounded-xl overflow-hidden shadow hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        @if ($book->book_img)
                            <img src="{{ asset('storage/' . $book->book_img) }}" alt="{{ $book->title }}"
                                class="w-full h-48 object-cover" />
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                                No Image
                            </div>
                        @endif
                    </div>

                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-1 truncate">{{ $book->title }}</h2>
                        <p class="text-sm text-gray-500 mb-1">Author: <span
                                class="font-medium text-gray-700">{{ $book->author_name }}</span></p>
                        <p class="text-sm text-gray-500 mb-1">Price: <span class="font-semibold text-green-600">Rs.
                                {{ $book->price }}</span></p>

                        <p class="text-sm mb-2">
                            Quantity:
                            <span
                                class="inline-block px-2 py-0.5 rounded-full text-white text-xs {{ $book->quantity > 0 ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $book->quantity }}
                            </span>
                        </p>

                        <p class="text-sm text-gray-600 leading-relaxed mb-3">
                            {{ Str::limit($book->description, 100) }}
                        </p>

                        <div class="text-right">
                            <a href="#"
                                class="text-blue-600 hover:underline text-sm font-medium transition duration-200">View
                                Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
