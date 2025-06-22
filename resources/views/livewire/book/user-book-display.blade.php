<div>
    <div class="relative w-full h-64 md:h-96 overflow-hidden">
        <img src="{{ asset('img/background.jpg') }}" alt="Library Header" class="w-full h-full object-cover">


        <div class="absolute inset-0  bg-opacity-50 flex flex-col items-center justify-center px-4 text-center">
            <h1 class="text-white text-3xl md:text-5xl font-extrabold drop-shadow-lg mb-4">
                Welcome to the Library
            </h1>
            <p class="text-gray-200 text-lg md:text-xl max-w-2xl mb-6 drop-shadow-md">
                Discover thousands of books and explore your passion for knowledge.
            </p>
            <input wire:model.live="search_text"
                class="w-full md:w-1/2 px-4 py-2 border border-blue-300 bg-white rounded shadow focus:outline-none"
                placeholder="Enter the book name...." />
        </div>

    </div>
    <div class="container mx-auto px-4 py-12">
        @if ($books->isEmpty())
            <div class="m-4">
                {{-- <select wire:model="selectedCategory"name="category_id"
                    class="border-2 border-sky-400 bg-sky-50 px-4 py-2 rounded-lg">
                    <option value="">All</option>
                    @foreach ($category as $categories)
                        <option value="{{ $categories->id }}"
                            {{ request('category_id') == $categories->id ? 'selected' : '' }}>
                            {{ $categories->category_name }}
                        </option>
                    @endforeach
                </select> --}}
                <div class="mb-4">
                    <select wire:model.live="selected_category" class="p-2 border rounded">
                        <option value="">All Categories</option>
                        @foreach ($category as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <p class="mt-4 text-center text-gray-500">No books found.</p>
        @else
            <div class="m-4">
                {{-- <select wire:model="selectedCategory"name="category_id"
                    class="border-2 border-sky-400 bg-sky-50 px-4 py-2 rounded-lg">
                    <option value="">All</option>
                    @foreach ($category as $categories)
                        <option value="{{ $categories->id }}"
                            {{ request('category_id') == $categories->id ? 'selected' : '' }}>
                            {{ $categories->category_name }}
                        </option>
                    @endforeach
                </select> --}}
                <div class="mb-4">
                    <select wire:model.live="selected_category" class="p-2 border rounded">
                        <option value="">All Categories</option>
                        @foreach ($category as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($books as $book)
                    <div class="flex flex-col md:flex-row bg-gray-50 p-6 rounded-lg shadow">
                        <img src="{{ asset('storage/' . $book->book_img) }}" alt="Book 1"
                            class="rounded-lg w-full md:w-1/3 object-cover">
                        <div class="md:ml-6 mt-4 md:mt-0 flex-1">
                            <h4 class="text-xl font-bold">{{ $book->title }}</h4>
                            <div class="flex items-center mt-3">

                                <h6 class="font-medium">{{ $book->author_name }}</h6>

                            </div>
                            <div class="flex items-center mt-3">

                                <h6 class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 ">
                                    {{ $book->category->category_name }}
                                </h6>

                            </div>
                            <div class="border-t mt-4 pt-4 flex justify-between">

                                <div>
                                    <p class="text-gray-500">Available Quantity</p>
                                    <strong class="text-lg text-green-600">{{ $book->quantity }}</strong>
                                </div>
                            </div>
                            <a href="" class="mt-4 inline-block text-blue-500 hover:underline">Book
                                Details ></a>
                            <div>
                                <a href="{{ route('book.borrow', $book->id) }}"
                                    class="btn btn-primary mt-4 p-2 inline-block bg-green-500 rounded-xl text-white hover:underline">Apply
                                    to
                                    borrow</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
