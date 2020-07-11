<?php

namespace App\Http\Livewire\Backend\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination; 

    public $perPage  = 5;
    public $statusUpdate = false;
    public $term;

    // Merender funsi reload page
    protected $listeners = [
        'tagStored' => 'handleStored',
        'tagUpdate' => 'handleUpdate',
    ];

    protected $updatesQueryString = ['term'];

    public function mount()
    {
        $this->term = request()->query('term', $this->term);
    }

    public function render()
    {
        $tags = $this->term === null ? 
        Tag::with('posts')->orderBy('name')->paginate($this->perPage) : 
        Tag::latest()->with('posts')->orderBy('name')->where('name', 'like', '%' . $this->term . '%')->paginate($this->perPage);
        $tagsCount = Tag::count();
        return view('livewire.backend.admin.tags.index', compact('tags','tagsCount'));
    }

    public function getTag($id)
    {
        $this->statusUpdate = true;
        $tag = Tag::find($id);
        // definisikan event listener emit
        $this->emit('getTag', $tag);

    }

    public function destroy($id)
    {
        if ($id) {
            $data = Tag::find($id);
            $data->delete();
            session()->flash('trash-message', 'Tag was deleted!');
        }
    }

    public function handleStored($tag)
    {
        // menampilkan flasmessage dengan session
        session()->flash('message', 'Tag ' .$tag['name']. ' was stored!');
    }

    public function handleUpdate($tag)
    {
        // Alert::success('Tag Update', 'Tag ' .$tag['name']. ' was Updated!');
        // menampilkan flasmessage dengan session
        session()->flash('message', 'Tag ' .$tag['name']. ' was Updated!');
    }
}
