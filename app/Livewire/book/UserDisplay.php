<?php

namespace App\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class UserDisplay extends Component
{

    public $search = '';

    public function render()
    {
        $query = Book::with('category')->latest();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('author_name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($query) {
                        $query->where('category_name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        $books = $query->get();

        return view('livewire.book.user-display', compact('books'));
    }
}
