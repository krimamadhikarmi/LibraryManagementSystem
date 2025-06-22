<div>
    <x-adminHeader />
    <div class="flex justify-between items-center m-16">
        <h1 class="text-4xl font-bold">Category</h1>
        <a href="{{ route('admin.category.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-300 shadow">
            Add Category
        </a>

    </div>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-12 mb-6 mt-12"
            role="alert">
            <span class="font-semibold">Success:</span> {{ session()->get('success') }}
        </div>
    @endif

    <livewire:category.category-table />

</div>
