<?php

namespace App\Http\Livewire\Frontend\Tag;

use App\Models\Tag;
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
    public $tag_name;
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
        $tag = Tag::where('slug', $this->segment)->first();

        try {
            //code...
            if($tag) {

                $this->tag_name    = $tag->name;
    
                $posts =$tag->posts() 
                        // Post::where('tag_id', $tag->id)
                        ->with('category', 'author', 'comments')
                        ->latestFirst()
                        ->published()
                        ->paginate($this->perPage);
            }
            return view('livewire.frontend.tag.show',[
                'posts'          => $posts,
                'tag_name'    => $this->tag_name
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return abort(404);
        }
        
    }
}
