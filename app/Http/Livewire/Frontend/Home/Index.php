<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        $date = Carbon::now();
        $posts = Post::with('author', 'tags', 'category', 'comments')
                    ->latestFirst()
                    ->published()
                    ->filter(request()->only(['term', 'year', 'month']))
                    ->take(6)
                    // ->paginate($this->limit);
                    ->get();
        return view('livewire.frontend.home.index', compact('posts'));
    }
}
