<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <title>Borrow List</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <x-adminHeader />

    <div class="container mx-auto px-4 py-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Borrowed Books List</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-blue-100 text-blue-700 uppercase text-sm font-semibold">
                    <tr>
                        <th class="px-6 py-3 border-b">#</th>
                        <th class="px-6 py-3 border-b">User ID</th>
                        <th class="px-6 py-3 border-b">Email</th>
                        <th class="px-6 py-3 border-b">Book Title</th>
                        <th class="px-6 py-3 border-b">Quantity</th>
                        <th class="px-6 py-3 border-b">Status</th>
                        <th class="px-6 py-3 border-b">Change Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrow as $index => $borrows)
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $borrows->user->id }}</td>
                            <td class="px-6 py-4">{{ $borrows->user->email }}</td>
                            <td class="px-6 py-4">{{ $borrows->book->title }}</td>
                            <td class="px-6 py-4">{{ $borrows->book->quantity }}</td>
                            <td class="px-6 py-4">{{ $borrows->status }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('book.approve', $borrows->id) }}"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">Approved</a>
                                <a href="{{ route('book.reject', $borrows->id) }}"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">Rejected</a>
                                <a href="{{ route('book.return', $borrows->id) }}"
                                    class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-600 transition duration-200">Returned</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
