<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <title>My Borrow History</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <x-header>
        <x-slot:title>
            Library
        </x-slot:title>
        <li><a href="/home" class="text-blue-600 font-semibold">Home</a></li>
        <li><a href="#" class="hover:text-blue-600">List</a></li>
        <li><a href="{{ route('book.history') }}" class="hover:text-blue-600">My History</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="hover:text-blue-600 text-gray-800 bg-transparent border-none p-0 cursor-pointer font-semibold">
                    Log Out
                </button>
            </form>
        </li>
    </x-header>

    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-8 text-center text-blue-700">My Borrow History</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-100 text-blue-700 uppercase text-sm font-bold">
                    <tr>
                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">Book Title</th>
                        <th class="px-6 py-4 text-left">Author</th>
                        <th class="px-6 py-4 text-left">Image</th>
                        <th class="px-6 py-4 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($data as $index => $dt)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $dt->book->title }}</td>
                            <td class="px-6 py-4">{{ $dt->book->author_name }}</td>
                            <td class="px-6 py-4">
                                @if ($dt->book->book_img)
                                    <img src="{{ asset('storage/' . $dt->book->book_img) }}"
                                        alt="{{ $dt->book->title }}" class="w-20 h-24 object-cover rounded-md border" />
                                @else
                                    <div
                                        class="w-20 h-24 bg-gray-200 flex items-center justify-center text-gray-500 rounded-md border">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-medium 
                                    {{ $dt->status === 'Approved'
                                        ? 'bg-green-100 text-green-800'
                                        : ($dt->status === 'Pending'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : 'bg-red-100 text-red-800') }}">
                                    {{ $dt->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
