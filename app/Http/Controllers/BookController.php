<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\BookFormReqValidation;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::all();
        return view('bookIndex', ['books' => $books]);
    }
    public function create()
    {
        $category = Category::all();
        return view('BookCreate', ['category' => $category]);
    }

    public function edit($bid)
    {
        $books = Book::find($bid);
        $category = Category::all();
        return view('editBook', ['books' => $books, 'category' => $category]);
    }


    public function update(BookFormReqValidation $request, Book $book)
    {
        $validated = $request->validated();

        if ($request->hasFile('book_img')) {
            if ($book->book_img && Storage::exists('public/' . $book->book_img)) {
                Storage::delete('public/' . $book->book_img);
            }

            $imagePath = $request->file('book_img')->store('book_images', 'public');
            $validated['book_img'] = $imagePath;
        }

        $book->update($validated);


        return redirect(route('book.index'))->with('success', 'Book Updated');
    }



    public function store(BookFormReqValidation $request)
    {

        $validated = $request->validated();
        // Handle image upload
        if ($request->hasFile('book_img')) {
            $imagePath = $request->file('book_img')->store('book_images', 'public');
            $validated['book_img'] = $imagePath;
        }

        Book::create($validated);

        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('book.store'))->with('success', 'Book deleted');
    }

    public function book_borrow($id)
    {
        $book_data = Book::find($id);
        $book_id = $id;
        $quantity = $book_data->quantity;
        if ($quantity >= 1) {
            if (Auth::id()) {
                $user_id = Auth::user()->id;
                $borrow = new Borrow;
                $borrow->book_id = $book_id;
                $borrow->user_id = $user_id;
                $borrow->status = 'Applied';
                $borrow->save();
                return redirect()->back()->with('message', 'Book Request is sent !!!!');
            } else {
                return redirect()->back()->with('message', 'Unauthorized');
            }
        } else {
            return redirect()->back()->with('message', 'Book Not Available');
        }
    }

    public function request()
    {

        $borrow = Borrow::all();
        return view('bookBorrow', ['borrow' => $borrow]);
    }


    public function approve($id)
    {

        $borrow = Borrow::find($id);
        $status = $borrow->status;

        if ($status == 'Approved') {
            return redirect()->back()->with('message', 'Book is already approved');
        } else {


            $borrow->status = 'Approved';
            $borrow->save();

            $bookid = $borrow->book_id;

            $book = Book::find($bookid);

            $book_qty = $book->quantity - '1';

            $book->quantity = $book_qty;

            $book->save();
            return redirect()->back()->with('success', 'Book Request Approved');
        }
    }

    public function reject($id)
    {

        $borrow = Borrow::find($id);
        $borrow->status = 'Rejected';
        $borrow->save();
        return redirect()->back()->with('success', 'Book Request Rejected');
    }

    public function return($id)
    {

        $borrow = Borrow::find($id);
        $status = $borrow->status;

        if ($status == 'Returned') {
            return redirect()->back()->with('message', 'Book is already Returned');
        } else {


            $borrow->status = 'Returned';
            $borrow->save();

            $bookid = $borrow->book_id;

            $book = Book::find($bookid);

            $book_qty = $book->quantity + '1';

            $book->quantity = $book_qty;

            $book->save();
            return redirect()->back()->with('success', 'Book Returned');
        }
    }
}
