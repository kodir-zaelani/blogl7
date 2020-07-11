<?php

namespace App\Http\Livewire\Backend\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name;

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:4|max:30',
        ]);

        $tag = Tag::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        // memamnggil fungsi reset form cara pertama
        $this->resetInput();

        // Emit seperti di vuejs Fungsi reload page
        $this->emit('tagStored', $tag);

    }

    // Fungsi reset form
    private function resetInput()
    {
        $this->name = null;
    }

    public function render()
    {
        return view('livewire.backend.admin.tags.create');
    }
}
