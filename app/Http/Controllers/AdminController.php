<?php

namespace App\Http\Controllers;

use App\Models\Book;


class AdminController extends Controller
{

    public function home()
    {
        $books = Book::all();
        return view('adminPage', ['books' => $books]);
    }
}
