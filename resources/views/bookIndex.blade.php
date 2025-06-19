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
        <!-- Title and Add Button -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold">Books</h1>
            <a href="{{ route('book.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-300 shadow">
                Add Book
            </a>
        </div>

        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded mb-6">
                ✅ <span class="font-semibold">Success:</span> {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Author</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Qty</th>
                        <th class="px-6 py-3">Edit</th>
                        <th class="px-6 py-3">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $index => $book)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium">{{ $book->title }}</td>
                            <td class="px-6 py-4">{{ $book->author_name }}</td>
                            <td class="px-6 py-4">Rs. {{ $book->price }}</td>
                            <td class="px-6 py-4 max-w-xs truncate" title="{{ $book->description }}">
                                {{ Str::limit($book->description, 50) }}
                            </td>
                            <td class="px-6 py-4">{{ $book->category->category_name }}</td>
                            <td class="px-6 py-4">{{ $book->quantity }}</td>
                            <td class="px-6 py-4">
                                <a href="#" class="text-blue-600 hover:underline font-semibold">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{ route('book.destroy', $book) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md text-sm font-semibold">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
