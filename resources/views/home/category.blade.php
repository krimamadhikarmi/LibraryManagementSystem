<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="w-24 h-1 bg-blue-500 mx-auto mb-4"></div>
            <h2 class="text-3xl font-bold text-gray-800">
                Browse Through Book <span class="text-blue-500">Categories</span> Here.
            </h2>
        </div>

        <!-- Category Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
            @php
                $categories = [
                    ['title' => 'Motivational', 'icon' => 'img/icon-01.png'],
                    ['title' => 'Money', 'icon' => 'img/icon-02.png'],
                    ['title' => 'Psychological', 'icon' => 'img/icon-03.png'],
                    ['title' => 'Story', 'icon' => 'img/icon-04.png'],
                    ['title' => 'Fictional', 'icon' => 'img/icon-05.png'],
                    ['title' => 'Romance', 'icon' => 'img/icon-06.png'],
                ];
            @endphp

            @foreach ($categories as $category)
                <div class="flex flex-col items-center transition transform hover:scale-105 duration-300">
                    <img src="{{ asset($category['icon']) }}" alt="{{ $category['title'] }}" class="w-16 h-16 mb-2" />
                    <h4 class="text-lg font-medium text-gray-700">{{ $category['title'] }}</h4>
                </div>
            @endforeach
        </div>
    </div>
</section>
