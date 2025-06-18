<header class="bg-white shadow">
    <div class="container mx-auto px-8">
        <nav class="flex justify-between items-center py-4">
            <div class="text-xl font-bold text-gray-800">{{$title}}</div>
            <ul class="hidden md:flex space-x-6">
               {{$slot}}
            </ul>
        </nav>
    </div>
</header>
