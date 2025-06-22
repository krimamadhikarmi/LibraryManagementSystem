<x-header>
    <x-slot:title>Admin</x-slot:title>
    <li><a href="{{ route('adminHome') }}" class="text-blue-500 font-semibold">Home</a></li>
    <li><a href="{{ route('admin.category') }}" class="hover:text-blue-500">Category</a></li>
    <li><a href="{{ route('book.index') }}" class="hover:text-blue-500">Books</a></li>
    <li><a href="{{route('admin.book.borrow')}}" class="hover:text-blue-500">Borrow List</a></li>
    <li><a href="{{route('logout')}}" class="hover:text-blue-500">Log Out</a></li>
</x-header>
