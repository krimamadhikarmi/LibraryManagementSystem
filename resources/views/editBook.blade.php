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
    <x-adminHeader />
    <main class="max-w-4xl mx-auto mt-12 px-6 mb-12">
        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="font-bold text-3xl flex justify-center items-center">Add Book</h1>
        <form method="POST" action="{{ route('book.update', $books->id) }}" 
            class="bg-white shadow-md rounded-lg p-6 mb-10" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Book Name</label>
                <input type="text" id="title" name="title" placeholder="Enter the book title..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"value={{ $books->title }}>
            </div>
            <div class="mb-4">
                <label for="author_name" class="block text-sm font-medium text-gray-700 mb-1">Author Name</label>
                <input type="text" id="author_name" name="author_name" placeholder="Enter the author name..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    value="{{ $books->author_name }}">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price </label>
                <input type="number" id="price" name="price" placeholder="Enter the category..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    value="{{ $books->price }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <input type="textarea" id="description" name="description" placeholder="Enter the category..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    value="{{ $books->description }}">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id">
                    <option value="{{ $books->category_id }}">{{ $books->category->category_name }}</option>
                     @foreach ($category as $categories)
            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
            @endforeach
            </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                <input type="number" id="quantity" name="quantity" placeholder="Enter the category..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    value="{{ $books->quantity }}">
            </div>
            <div class="mb-4">
                <label for="book_img" class="block text-sm font-medium text-gray-700 mb-1">Book Image</label>
                @if ($books->book_img)
                    <img src="{{ asset('storage/' . $books->book_img) }}" alt="{{ $books->title }}"
                        class="w-20 h-24 object-cover rounded-md border" />
                @else
                    <div class="w-20 h-24 bg-gray-200 flex items-center justify-center text-gray-500 rounded-md border">
                        No Image
                    </div>
                @endif
                <div class="mt-4">
                    <label for="book_img" class="block text-sm font-medium text-gray-700 mb-1">Change Book Image</label>
                    <input type="file" id="book_img" name="book_img" placeholder="Enter the category..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                </div>

            </div>
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Submit
            </button>
        </form>

    </main>
</body>

</html>
