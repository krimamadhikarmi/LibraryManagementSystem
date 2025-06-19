<div class="p-8 bg-gray-100">
    <h2 class="text-3xl font-bold text-blue-600 mb-8">Book Statistics</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white shadow-xl rounded-lg p-6 border-t-4 border-green-700">
            <div class="text-4xl font-extrabold text-blue-600"> {{ $books }}</div>
            <p class="mt-2 text-lg font-bold text-gray-600">Total Books</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6 border-t-4 border-yellow-500">
            <div class="text-4xl font-extrabold text-yellow-600">{{ $borrow }}</div>
            <p class="mt-2 text-lg font-bold text-gray-600">Borrowed Books</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6 border-t-4 border-green-500">
            <div class="text-4xl font-extrabold text-green-600">{{ $return }}</div>
            <p class="mt-2 text-lg font-bold text-gray-600">Returned Books</p>
        </div>

    </div>
</div>
