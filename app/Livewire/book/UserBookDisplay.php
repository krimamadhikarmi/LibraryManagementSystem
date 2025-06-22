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

    public function apply($id)
    {

        $book_data = Book::find($id);
        $book_id = $id;
        $quantity = $book_data->quantity;

        if ($quantity >= 1) {
            if (Auth::id()) {
                $user_id = Auth::user()->id;
                $borrow = new Borrow();
                $borrow->book_id = $book_id;
                $borrow->user_id = $user_id;
                $borrow->status = 'Applied';
                $borrow->save();
                // return redirect()->back()->with('message', 'Book Request is sent !!!!');
                session()->flash('success','Book Request is sent !!!!');
            } else {
                return redirect()->back()->with('message', 'Unauthorized');
            }
        } else {
            return redirect()->back()->with('message', 'Book Not Available');
        }
    }

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
