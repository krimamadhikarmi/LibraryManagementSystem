<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(entrypoints: 'resources/css/app.css')
    <title>Admin Panel - Category</title>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

    <x-adminHeader />

    <main class="max-w-4xl mx-auto mt-12 px-6 mb-12">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-700">Category</h1>

        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="font-semibold">Success:</span> {{ session()->get('success') }}
            </div>
        @endif

        <div>
            <form method="POST" action="{{ route('category.store') }}" class="bg-white shadow-md rounded-lg p-6 mb-10">
                @csrf
                <div class="mb-4">
                    <label for="category_name" class="block text-sm font-medium text-gray-700 mb-1">Category
                        Name</label>
                    <input type="text" id="category_name" name="category_name" placeholder="Enter the category..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                    Submit
                </button>
            </form>
        </div>


        <livewire:category-table />
    </main>

</body>

</html>
