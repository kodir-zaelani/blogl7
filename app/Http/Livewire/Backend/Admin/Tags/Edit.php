<?php

namespace App\Http\Livewire\Backend\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $name;
    public $tagId;

    protected $listeners = [
        'getTag' => 'showTag',
    ];

    public function showTag($tag)
    {
        $this->name = $tag['name'];
        $this->tagId = $tag['id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:4|max:50',
        ]);
        
        if ($this->tagId) {
        
            $tag = Tag::find($this->tagId);
            
            $tag->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name)
            ]);

            $this->resetInput();

            $this->emit('tagUpdate', $tag);
        }

    }

    // Fungsi reset form
    private function resetInput()
    {
        $this->name = null;
    }

    public function render()
    {
        return view('livewire.backend.admin.tags.edit');
    }
}
