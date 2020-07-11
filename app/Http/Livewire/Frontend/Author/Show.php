<?php

namespace App\Http\Livewire\Frontend\Author;

use App\User;
use App\Models\Post;
use Livewire\Component;
use App\Http\Requests;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    /**
     * public variable
     */
    public $segment;
    public $author_name;
    public $perPage  = 6;

    /**
     * mount or construct function
     */
    public function mount(Request $request)
    {
        $this->segment = $request->segment(2);
    }

    public function render()
    {
        $author = User::where('slug', $this->segment)->first();

        try {
            //code...
            if($author) {

                $this->author_name    = $author->name;
    
                $posts = $author->posts()
                // Post::where('author_id', $author->id)
                        ->with('category', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->paginate($this->perPage);
            }
            return view('livewire.frontend.author.show',[
                'posts'          => $posts,
                'author_name'    => $this->author_name
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return abort(404);
        }
        
    }
}
