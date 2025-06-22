<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class UserBookDisplay extends Component
{
    public $search_text = '';
    public $selected_category = '';

    public function render()
    {
        $book_query = Book::with('category')->latest();

        if (!empty($this->search_text)) {
            $book_query->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search_text . '%')
                    ->orWhere('author_name', 'like', '%' . $this->search_text . '%')
                    ->orWhereHas('category', function ($q) {
                        $q->where('category_name', 'like', '%' . $this->search_text . '%');
                    });
            });
        }

        if (!empty($this->selected_category)) {
            $book_query->where('category_id', $this->selected_category);
        }

        $books = $book_query->get();

        $category = Category::all();

        return view('livewire.book.user-book-display')->with([
            'books' => $books,
            'category' => $category
        ]);
    }
}
