<?php

namespace App\Http\Livewire\Backend\Admin\Posts;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination; 

    public $perPage  = 5;
    public $statusUpdate = false;
    public $term;

    protected $updatesQueryString = ['term'];

    public function mount()
    {
        $this->term = request()->query('term', $this->term);
    }

    public function render()
    {
        $posts = Post::with('category', 'author')->latest()->paginate($this->perPage);
        $postCount = Post::count();
        return view('livewire.backend.admin.posts.index', compact('posts', 'postCount'));
    }
}
