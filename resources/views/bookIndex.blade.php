<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(entrypoints: 'resources/css/app.css')

    <title>Document</title>
</head>

<body>
    <x-adminHeader />
    <div class="m-12">
        <div class="flex justify-center items-center">
            <h1 class="font-bold text-5xl mb-8">Books</h1>
        </div>
        <a class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300"
            href="{{ route('book.create') }}"> Add
            Book</a>

        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 mt-6" role="alert">
                <span class="font-semibold">Success:</span> {{ session()->get('success') }}
            </div>
        @endif
        <div class="mt-12">
            <table class="min-w-full bg-white shadow-md  overflow-hidden">
                <thead class="bg-gray-100 text-gray-700 text-left">
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Author</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Quantity</th>
                        <th class="border px-4 py-2">Edit</th>
                        <th class="border px-4 py-2">Delete</th>
                    </tr>
                </thead>
                @foreach ($books as $index => $book)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="border px-6 py-2">{{ $index + 1 }}</td>
                        <td class="border px-6 py-2">{{ $book->title }}</td>
                        <td class="border px-6 py-2">{{ $book->author_name }}</td>
                        <td class="border px-6 py-2">{{ $book->price }}</td>
                        <td class="border px-6 py-2">{{ $book->description }}</td>
                        <td class="border px-6 py-2">{{ $book->category->category_name }}</td>
                        <td class="border px-6 py-2">{{ $book->quantity }}</td>

                        <td class="px-6 py-4 space-x-2">
                            <a class="text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="border px-4 py-2">
                            <form method="post"
                                action="{{ route('book.destroy', ['book' => $book]) }} "class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('delete')
                                <input value="Delete" type="submit"
                                    class="border border-red-300 rounded-xl px-4 p-2 bg-red-500 text-white" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</body>

</html>
