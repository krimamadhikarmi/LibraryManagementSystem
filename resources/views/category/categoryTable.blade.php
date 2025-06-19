<table class="min-w-full bg-white shadow-md  overflow-hidden">
    <thead class="bg-gray-100 text-gray-700 text-left">
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Edit</th>
            <th class="border px-4 py-2">Delete</th>
        </tr>
    </thead>
    @foreach ($category as $index => $categories)
        <tr class="border-t hover:bg-gray-50">
            <td class="border px-6 py-2">{{ $index + 1 }}</td>
            <td class="border px-6  py-2">{{ $categories->category_name }}</td>
            <td class="px-6 py-4 space-x-2">
                <a class="text-blue-500 hover:underline"
                    href="{{ route('category.edit', ['category' => $categories->id]) }}">Edit</a>
            </td>
            <td class="border px-4 py-2">
                <form method="post"
                    action="{{ route('category.destroy', ['category' => $categories]) }}" class="inline-block"
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
