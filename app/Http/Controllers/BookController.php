<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

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
}
