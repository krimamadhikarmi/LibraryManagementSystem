<div>
    <x-adminHeader />
    <main class="max-w-4xl mx-auto mt-12 px-6 mb-12">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-700">Add Category</h1>
        <div>
            <form wire:submit.prevent="store" class="bg-white shadow-md rounded-lg p-6 mb-10">
                @csrf
                <div class="mb-4">
                    <label for="category_name" class="block text-sm font-medium text-gray-700 mb-1">Category
                        Name</label>
                    <input type="text" wire:model="category_name" id="category_name" name="category_name"
                        placeholder="Enter the category..."
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('category_name') ? 'border-red-500' : 'border-gray-300' }}">

                    @error('category_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300 ">
                    Submit
                </button>
                <a href="{{ route('admin.category') }}"
                    class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 transition duration-300 ">
                    Cancel
                </a>
            </form>
        </div>



    </main>
</div>
