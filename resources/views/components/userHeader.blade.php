<x-header>
    <x-slot:title>
        Library
    </x-slot:title>
    <li><a href="/" class="text-blue-500 font-semibold">Home</a></li>

    <li><a href="{{ route('book.history') }}" class="hover:text-blue-500">My History</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:text-blue-500 bg-transparent border-none p-0 cursor-pointer">
                Log Out
            </button>
        </form>
    </li>


</x-header>
