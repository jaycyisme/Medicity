<?php

namespace App\Livewire\Medicity\Blog;

use App\Models\Blog;
use Livewire\Component;
use App\Models\BlogCategory;
use Livewire\WithPagination;

class BlogList extends Component
{
    public $search = '';
    public $categoryFilter = null;
    public $blogCategories;
    public $latestBlogs;

    public function mount() {
    $this->latestBlogs = Blog::orderBy('created_at', 'desc')
                ->take(4)
                ->get();
        $this->blogCategories = BlogCategory::all();
    }

    public function filterByCategory($categoryId = null)
    {
        $this->categoryFilter = $categoryId;
    }

    public function render()
    {
        $query = Blog::query()->orderBy('id', 'DESC');

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        if ($this->categoryFilter) {
            $query->where('blog_category_id', $this->categoryFilter);
        }

        return view('livewire.medicity.blog.blog-list', [
            'blogs' => $query->get()
        ]);
    }
}
