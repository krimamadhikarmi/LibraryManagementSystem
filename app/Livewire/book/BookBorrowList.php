<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Borrow;
use Livewire\Component;

class BookBorrowList extends Component
{

    public function approve($id)
    {
        $borrow = Borrow::findOrFail($id);
        if ($borrow->status === 'Returned') {
            session()->flash('message', 'Returned books cannot be approved.');
            return;
        }
        if ($borrow->status === 'Approved') {
            session()->flash('message', 'Book is already approved');
            return;
        };
        $borrow->status = 'Approved';
        $borrow->save();


        $book = Book::find($borrow->book_id);
        $book->decrement('quantity');
        session()->flash('message', 'Request approved.');
    }

    public function reject($id)
    {
        $borrow = Borrow::findOrFail($id);
        if ($borrow->status === 'Approved') {
            session()->flash('message', 'Approved books cannot be rejected.');
            return;
        }

        if ($borrow->status === 'Returned') {
            session()->flash('message', 'Returned Book cannot be rejected');
            return;
        };
        $borrow->status = 'Rejected';
        $borrow->save();
        session()->flash('message', 'Request Rejected.');
    }

    public function returned($id)
    {
        $borrow = Borrow::findOrFail($id);

        if ($borrow->status !== 'Approved') {
            session()->flash('message', 'Only approved books can be marked as returned.');
            return;
        }

        $borrow->status = 'Returned';
        $borrow->save();

        $book = Book::find($borrow->book_id);
        $book->increment('quantity');

        session()->flash('message', 'Book returned.');
    }
    public function render()
    {
        return view('livewire.book.book-borrow-list')->with([
            'borrow' => Borrow::all()
        ]);
    }
}
