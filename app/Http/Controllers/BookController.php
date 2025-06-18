<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Dflydev\DotAccessData\Data;
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


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'book_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('book_img')) {
            $imagePath = $request->file('book_img')->store('book_images', 'public');
            $data['book_img'] = $imagePath;
        }

        Book::create($data);

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
}
