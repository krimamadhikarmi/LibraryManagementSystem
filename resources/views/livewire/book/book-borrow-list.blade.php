<div>
    <x-adminHeader />
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-4xl font-bold mb-6 text-gray-800 flex justify-center text-center">Borrowed Books List</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            @if (session()->has('message'))
                <div class="bg-blue-100 border border-blue-400 text-blue-800 px-4 py-3 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif
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
                                <button wire:click="approve({{ $borrows->id }})"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">Approved</button>
                                <button wire:click="reject({{ $borrows->id }})"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">Rejected</button>
                                <button wire:click="returned({{ $borrows->id }})"
                                    class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-600 transition duration-200">Returned</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
