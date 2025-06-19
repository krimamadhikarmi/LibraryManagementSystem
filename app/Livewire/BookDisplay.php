<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookDisplay extends Component
{

    public function render()
    {
        return view('livewire.book-display')->with([
            'books' => Book::paginate(5)
        ]);
    }
}
