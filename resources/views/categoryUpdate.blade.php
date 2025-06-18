 <form method="POST" action="{{ route('category.update', ['category' => $category->id]) }}">
     @csrf
     @method('put')
     <label>Category Name</label>
     <input type="text" name="category_name" placeholder="Enter the category..." value="{{ $category->category_name }}"
         class="border-black rounded-sm" />
     <input type="submit" name="Submit" class="bg-sky-400 p-2 rounded-lg" />
 </form>
