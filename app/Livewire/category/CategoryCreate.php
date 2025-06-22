<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $category_name;
    public function store()
    {
        $this->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create([
            'category_name' => $this->category_name,
        ]);


        return redirect()->route('admin.category')->with('success', 'Category added successfully!');
    }

    public function render()
    {
        return view('livewire.category.category-create');
    }
}
