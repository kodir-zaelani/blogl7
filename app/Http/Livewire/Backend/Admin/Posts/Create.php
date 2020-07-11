<?php

namespace App\Http\Livewire\Backend\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $categories;
    public $title;
    public $slug;
    public $excerpt;
    public $body;
    public $category_id;
    public $tags;
    public $image;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'image'         => 'required|image',
            'title'         => 'required',
            'excerpt'       => 'required',
            'body'          => 'required',
            'category_id'   => 'required',
            'published_at'     => 'required',
            
        ]);

        $this->image->store('public/post');

        $post = Post::create([
            'image'         => $this->image->hashName(),
            'title'         => $this->title,
            'slug'          => Str::slug($this->title, '-'),
            'excerpt'       => $this->excerpt,
            'body'          => $this->body,
            'category_id'   => $this->category_id,
            'published_at'  => $this->published_at,
        ]);

        if($post) {
            session()->flash('message', 'Data saved successfully');
        } else {
            session()->flash('error-message', 'Data failed to save');
        }

        return redirect()->route('posts.index');
    }

    public function render()
    {
        // $categories = Category::latest()->get();
        
        // return view('livewire.backend.admin.posts.create', compact('categories'));

        return view('livewire.backend.admin.posts.create', [
            'categories' => Category::all(),
        ]);

        
    }
}
