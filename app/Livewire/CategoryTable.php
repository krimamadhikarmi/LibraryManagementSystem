<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryTable extends Component
{
    public function render()
    {
        return view('livewire.category-table')->with([
            'category' => Category::paginate(10)
        ]);
    }
}
