<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserBookDisplay extends Component
{
    public $search_text = '';
    public $selected_category = '';
    public $books;
    public $category;

    public function mount()
    {
        $this->category = Category::all();
        $this->loadBooks();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search_text', 'selected_category'])) {
            $this->loadBooks();
        }
    }

    public function loadBooks()
    {
        $query = Book::with('category');

        if (!empty($this->search_text)) {
            $query->where('title', 'like', '%' . $this->search_text . '%')
                ->orWhere('author_name', 'like', '%' . $this->search_text . '%');
        }

        if (!empty($this->selected_category)) {
            $query->where('category_id', $this->selected_category);
        }

        $this->books = $query->get();
    }

    public function apply($bookId)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if user has already borrowed this book
        $existingBorrow = Borrow::where('user_id', Auth::id())
            ->where('book_id', $bookId)
            ->where('status', '!=', 'returned')
            ->first();

        if ($existingBorrow) {
            session()->flash('error', 'You have already applied for this book or currently have it borrowed.');
            return;
        }

        // Create new borrow request
        Borrow::create([
            'user_id' => Auth::id(),
            'book_id' => $bookId,
            'status' => 'Applied',
        ]);

        session()->flash('success', 'Your application to borrow this book has been submitted successfully!');
    }

    public function render()
    {
        return view('livewire.book.user-book-display');
    }
}
