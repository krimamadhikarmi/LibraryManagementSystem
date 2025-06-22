<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryUpdate extends Component
{
    public $categoryId;
    public $category_name;

    public function mount($id)
    {
        $this->categoryId = $id;
        $category = Category::findOrFail($id);
        $this->category_name = $category->category_name;
    }

    public function update()
    {
        $this->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($this->categoryId);
        $category->category_name = $this->category_name;
        $category->save();

        return redirect()->route('admin.category')
            ->with('success', 'Category updated successfully!');
    }

    public function render()
    {
        return view('livewire.category.category-update');
    }
}
