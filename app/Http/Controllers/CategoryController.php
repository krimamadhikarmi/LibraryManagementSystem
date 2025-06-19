<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormReqValidation;
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


    public function store(CategoryFormReqValidation $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        return view('categoryUpdate', ['category' => $category]);
    }

    public function update(CategoryFormReqValidation $request, Category $category)
    {
        $validated = $request->validated();

        $category->update($validated);
        return redirect(route('category.store'))->with('success', 'Category Updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.store'))->with('success', 'Category deleted');
    }
}
