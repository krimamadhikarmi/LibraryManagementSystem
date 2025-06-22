<div class="m-12">
    <h2 class="text-2xl font-bold mb-4">Edit Category</h2>

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label>Category Name</label><br />
            <input type="text" wire:model="category_name" placeholder="Enter the category..." value="category_name"
                class="border border-gray-400 rounded px-4 py-2 w-full" />
            @error('category_name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="space-x-2">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">Update</button>

            <a href="{{ route('admin.category') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
