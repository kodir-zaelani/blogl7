<?php

namespace App\Http\Livewire\Backend\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $title;
    public $categoryId;

    protected $listeners = [
        'getCategory' => 'showCategory',
    ];

    public function render()
    {
        return view('livewire.backend.admin.categories.edit');
    }

    public function showCategory($category)
    {
        $this->title = $category['title'];
        $this->categoryId = $category['id'];
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:4|max:50',
        ]);
        
        if ($this->categoryId) {
        
            $category = Category::find($this->categoryId);
            
            $category->update([
                'title' => $this->title,
                'slug' => Str::slug($this->title)
            ]);

            $this->resetInput();

            $this->emit('categoryUpdate', $category);
        }

    }

    // Fungsi reset form
    private function resetInput()
    {
        $this->title = null;
    }
}
