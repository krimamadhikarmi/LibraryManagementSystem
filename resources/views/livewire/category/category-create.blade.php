<div class="flex justify-between items-center m-16">
    <h1 class="text-4xl font-bold">Category</h1>

    <button wire:click="$dispatch('showcreatemodal')"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-300 shadow">Add
        Category</button>


    @if ($showModal)
        <div class="fixed inset-0 bg-black/70 bg-opacity-20 flex items-center justify-center z-50" wire:key="modal"
            wire:keydown.escape="$set('showModal', false)">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 p-6 relative"
                @click.away="$set('showModal', false)">

                <button wire:click="$set('showModal', false)"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <h2 class="text-2xl font-semibold mb-6 text-center">Add Category</h2>

                <form wire:submit.prevent="store" class="space-y-4">
                    @csrf
                    <div>
                        <label for="category_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Category Name
                        </label>
                        <input type="text" wire:model="category_name" id="category_name" name="category_name"
                            placeholder="Enter the category..."
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 {{ $errors->has('category_name') ? 'border-red-500' : 'border-gray-300' }}">
                        @error('category_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button" wire:click="$set('showModal', false)"
                            class="px-4 py-2 rounded-md bg-red-500 text-white hover:bg-red-600 transition">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
