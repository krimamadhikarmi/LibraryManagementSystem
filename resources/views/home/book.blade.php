<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div>
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-greeb\n-700 px-4 py-3 rounded mb-6 mt-6"
                    role="alert">
                    <span class="font-semibold">Success:</span> {{ session()->get('message') }}
            @endif
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-12">
            <div>
                <div class="w-24 h-1 bg-blue-500 mb-4"></div>
                <h2 class="text-3xl font-bold"><span class="text-blue-500">Books</span> List.
                </h2>
            </div>

            <div>
                <ul class="flex space-x-6">
                    <li class="cursor-pointer text-blue-500 font-semibold">All Books</li>
                    <li class="cursor-pointer hover:text-blue-500">Popular</li>
                    <li class="cursor-pointer hover:text-blue-500">Latest</li>
                </ul>
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
                        <div class="border-t mt-4 pt-4 flex justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Current Available</p>
                                <strong class="text-lg">{{ $book->quantity }}</strong>
                            </div>

                        </div>
                        <a href="" class="mt-4 inline-block text-blue-500 hover:underline">View Item
                            Details</a>
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
    </div>
</section>
