<div>
    <x-adminHeader />
    
    <livewire:category.category-create/>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-12 mb-6 mt-12"
            role="alert">
            <span class="font-semibold">Success:</span> {{ session()->get('success') }}
        </div>
    @endif

    <livewire:category.category-table />

</div>
