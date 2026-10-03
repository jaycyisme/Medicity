<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;
use App\Models\BlogCategory;

class BlogUpdate extends Component
{
    public $blogId, $title, $content, $thumbnail, $author_name, $author_image, $author_overview,
    $blog_category_id;
    public $blogcategories;
    public $blog;

    public function mount($blogId)
    {
        $this->blogId = $blogId;
        $this->blog = Blog::findOrFail($this->blogId);

        // Load data from the existing service
        $this->title = $this->blog->title;
        $this->content = $this->blog->content;
        $this->thumbnail = $this->blog->thumbnail;
        $this->author_name = $this->blog->author_name;
        $this->author_image = $this->blog->author_image;
        $this->author_overview = $this->blog->author_overview;
        $this->blog_category_id = $this->blog->blog_category_id;

        // Get lists of clinics and specialities
        $this->blogcategories = BlogCategory::all();
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

    public function update() {
        $this->validate();

        $blog = Blog::findOrFail($this->blogId);
        $blog->update([
            'title' => $this->title,
            'content' => $this->content,
            'thumbnail' => $this->thumbnail,
            'author_name' => $this->author_name,
            'author_image' => $this->author_image,
            'author_overview' => $this->author_overview,
            'blog_category_id' => $this->blog_category_id,
        ]);

        // session()->flash('status', 'Disease updated successfully!');
        return redirect()->route('blog.index')->with('success','Blog updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.blog.blog-update');
    }
}
