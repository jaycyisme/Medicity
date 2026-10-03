<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class BlogTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.blog-table', [
            'blogs' => Blog::orderBy('id', 'DESC')->where('title', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
