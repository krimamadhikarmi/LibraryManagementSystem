<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Borrow;
use Livewire\Component;

class BookStats extends Component
{
    public $books;
    public $total_borrow;
    public $total_return;
    public function mount()
    {
        $this->books = Book::count();
        $this->total_return = Borrow::where('status', 'Returned')->count();
        $this->total_borrow = Borrow::where('status', 'Approved')->count();
    }
    public function render()
    {
        return view('livewire.book-stats')->with([
            'books' => $this->books,
            'borrow' => $this->total_borrow,
            'return' => $this->total_return,
        ]);
    }
}
