<?php

namespace App\Livewire\Category;

use Livewire\WithPagination;
use App\Models\Category;
use Livewire\Component;

class CategoryTable extends Component
{
    use WithPagination;
    

    protected $listeners = ['categoryAdded' => '$refresh'];


    public function delete($id)
    {

        $category = Category::findOrFail($id);
        $category->delete();

        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.category.category-table')->with([
            'category' => Category::paginate(10)
        ]);
    }
}
