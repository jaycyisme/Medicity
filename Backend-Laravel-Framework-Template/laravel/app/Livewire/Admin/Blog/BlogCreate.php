<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\Component;

class BlogCreate extends Component
{
    public $title, $content, $thumbnail, $author_name, $author_image, $author_overview,
    $blog_category_id;
    public $blogcategories;

    public function mount() {
        $this->blogcategories = BlogCategory::all();

        $this->blog_category_id = BlogCategory::first()->id;
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required',
        'thumbnail' => 'required|string',
        'author_name' => 'required|string|max:255',
        'author_image' => 'required|string',
        'author_overview' => 'required|string',
        'blog_category_id' => 'nullable|exists:blog_categories,id',
    ];

    public function save() {
        $this->validate();


        $blog = Blog::create([
            'title' => $this->title,
            'content' => $this->content,
            'thumbnail' => $this->thumbnail,
            'author_name' => $this->author_name,
            'author_image' => $this->author_image,
            'author_overview' => $this->author_overview,
            'blog_category_id' => $this->blog_category_id,
        ]);

        return redirect()->route('blog.index')->with('success','Blog created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.blog.blog-create');
    }
}
