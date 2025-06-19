<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index(Request $request)
    {
        $categories = Category::all();

        $books = Book::with('category')
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->get();

        return view('index', [
            'books' => $books,
            'category' => $categories
        ]);
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
