<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookTable extends Component
{
    use WithPagination;
    // public $books;


    public function render()
    {
        return view('livewire.book-table', [
            'books' => Book::paginate(10)
        ]);
    }
}
