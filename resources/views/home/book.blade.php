<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div>
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-greeb\n-700 px-4 py-3 rounded mb-6 mt-6"
                    role="alert">
                    <span class="font-semibold">Success:</span> {{ session()->get('message') }}
            @endif
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center mb-12">
            <div>

                <h2 class="text-4xl font-bold"><span class="text-blue-500">Books</span> List
                </h2>

            </div>


        </div>
        <div class="m-4">
            <form method="GET" action="{{ route('userHome') }}">
                <select name="category_id" class="border-2 border-sky-400 bg-sky-50 px-4 py-2 rounded-lg"
                    onchange="this.form.submit()">
                    <option value="">All</option> 
                    @foreach ($category as $categories)
                        <option value="{{ $categories->id }}"
                            {{ request('category_id') == $categories->id ? 'selected' : '' }}>
                            {{ $categories->category_name }}
                        </option>
                    @endforeach
                </select>
            </form>


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
    </div>
</section>
