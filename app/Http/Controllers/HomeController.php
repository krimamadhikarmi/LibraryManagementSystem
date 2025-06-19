<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {
        $books = Book::all();
        return view('index', ['books' => $books]);
    }

    public function history()
    {
        if (Auth::id()) {
            $user_id = Auth::user()->id;
            $data = Borrow::where('user_id', '=', $user_id)->get();

            return view('bookHistory', ['data' => $data]);
        }
    }
}
