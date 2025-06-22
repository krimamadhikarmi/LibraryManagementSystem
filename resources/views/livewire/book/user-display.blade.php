
<div class="bg-gray-100">

  
    <x-userHeader />

    <div class="relative w-full h-64 md:h-96 overflow-hidden">
        <img src="{{ asset('img/background.jpg') }}" alt="Library Header" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center px-4 text-center">
            <h1 class="text-white text-3xl md:text-5xl font-extrabold drop-shadow-lg mb-4">
                Welcome to the Library
            </h1>
            <p class="text-gray-200 text-lg md:text-xl max-w-2xl mb-6 drop-shadow-md">
                Discover thousands of books and explore your passion for knowledge.
            </p>
            <input type="text" wire:model.debounce.300ms="search"
                placeholder="Search books by title, author, or category..."
                class="w-full md:w-1/2 px-4 py-2 border border-blue-300 bg-white rounded shadow focus:outline-none" />
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        @if ($books->isEmpty())
            <p class="mt-4 text-center text-gray-500">No books found.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($books as $book)
                    <div class="bg-white rounded shadow p-4">
                        <h3 class="text-xl font-semibold mb-1">{{ $book->title }}</h3>
                        <p class="text-gray-700 text-sm mb-1">Author: {{ $book->author_name }}</p>
                        <p class="text-gray-600 text-sm mb-2">Category: {{ $book->category->category_name ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-500">Available: {{ $book->quantity }}</p>

                        <form method="POST" action="{{ route('book.request', $book->id) }}" class="mt-2">
                            @csrf
                            <button
                                class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition">
                                Request Book
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @livewireScripts
</div>

