<div>
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-100 text-blue-700 uppercase text-sm font-semibold">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Author</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Qty</th>
                    <th class="px-6 py-3">Edit</th>
                    <th class=  "px-6 py-3">Delete</th>
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
    <div class="mt-8 flex justify-center">
        {{ $books->links() }}
    </div>

</div>
