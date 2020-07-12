<?php

namespace App\Http\Livewire\Backend\Admin\Categories;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination; 

    public $perPage  = 5;
    public $statusUpdate = false;
    public $term;

    // Merender funsi reload page
    protected $listeners = [
        'categoryStored' => 'handleStored',
        'categoryUpdate' => 'handleUpdate',
    ];

    protected $updatesQueryString = ['term'];

    public function mount()
    {
        $this->term = request()->query('term', $this->term);
    }

    public function render()
    {
        $categories = $this->term === null ? 
        Category::with('posts')->orderBy('title')->paginate($this->perPage) : 
        Category::latest()->with('posts')->orderBy('title')->where('title', 'like', '%' . $this->term . '%')->paginate($this->perPage);
        $categoriesCount = Category::count();
        return view('livewire.backend.admin.categories.index', compact('categories', 'categoriesCount', 'category_id'));
    }

    public function getCategory($id)
    {
        $this->statusUpdate = true;
        $category = Category::find($id);
        // definisikan event listener emit
        $this->emit('getCategory', $category);

    }

    public function destroy($id)
    {
        if ($id) {
            $data = Category::find($id);
            $data->delete();
            session()->flash('trash-message', 'Category was deleted!');
        }
    }

    public function handleStored($category)
    {
        // menampilkan flasmessage dengan session
        session()->flash('message', 'Category ' .$category['title']. ' was stored!');
    }

    public function handleUpdate($category)
    {
        // Alert::success('Category Update', 'Category ' .$category['title']. ' was Updated!');
        // menampilkan flasmessage dengan session
        session()->flash('message', 'Category ' .$category['title']. ' was Updated!');
    }
}
