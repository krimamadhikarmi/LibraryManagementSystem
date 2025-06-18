<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // public function index()
    // {
    //     return view('category.index');
    // }
    public function create()
    {
        $category = Category::all();
        return view('category', ['category' => $category]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required',
        ]);

        Category::create($data);

        return redirect()->back()->with('success', 'Category added successfully!');
    }
}
