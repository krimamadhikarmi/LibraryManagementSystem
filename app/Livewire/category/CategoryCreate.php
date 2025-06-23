<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $category_name;
    public $showModal = false;

    protected $listeners = ['showcreatemodal' => 'openModal'];

    public function openModal()
    {
        $this->showModal = true;
    }
    public function store()
    {
        $this->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create([
            'category_name' => $this->category_name,
        ]);

        $this->dispatch('categoryAdded');
        $this->reset(['category_name', 'showModal']);
        session()->flash('success', 'Category added successfully!');
    }

    public function render()
    {
        return view('livewire.category.category-create');
    }
}
