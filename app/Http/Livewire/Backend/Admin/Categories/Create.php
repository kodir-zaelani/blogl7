<?php

namespace App\Http\Livewire\Backend\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class Create extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.backend.admin.categories.create');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|min:4|max:30',
        ]);

        $category = Category::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
        ]);

        // memamnggil fungsi reset form cara pertama
        $this->resetInput();

        // Emit seperti di vuejs Fungsi reload page
        $this->emit('categoryStored', $category);

    }

    // Fungsi reset form
    private function resetInput()
    {
        $this->title = null;
    }
}
