<table class="border border-black w-full mt-8">
    <tr class="bg-gray-100">
        <th class="border px-4 py-2">ID</th>
        <th class="border px-4 py-2">Name</th>
        <th class="border px-4 py-2">Edit</th>
        <th class="border px-4 py-2">Delete</th>
    </tr>
    @foreach ($category as $categories)
        <tr>
            <td class="border px-4 py-2">{{ $categories->id }}</td>
            <td class="border px-4 py-2">{{ $categories->category_name }}</td>
            <td class="border px-4 py-2">
                <a class="border border-green-300 rounded-xl px-4 p-2 bg-green-500 text-white"
                    href="{{ route('category.edit', ['category' => $categories->id]) }}">Edit</a>
            </td>
            <td class="border px-4 py-2">
                <form method="post" action="{{ route('category.destroy', ['category' => $categories]) }}">
                    @csrf
                    @method('delete')
                    <input value="Delete" type="submit"
                        class="border border-red-300 rounded-xl px-4 p-2 bg-red-500 text-white" />
                </form>
            </td>
        </tr>
    @endforeach
</table>
