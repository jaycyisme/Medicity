<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class BlogCategoryTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $categories_deleted;
    public function mount() {
        $this->categories_deleted = BlogCategory::onlyTrashed()->get();
    }

    public function restore($id) {
        $category = BlogCategory::withTrashed()->findOrfail($id);

        $category->restore();

        return redirect()->route('blogcategory.index')->with('success','Blog Category is restored successfully');
    }

    public function forceDelete($id) {
        $category = BlogCategory::withTrashed()->findOrfail($id);
        $category->forceDelete();

        return redirect()->route('blogcategory.index')->with('success','Blog Category is deleted permanently');
    }

    public function render()
    {
        return view('livewire.blog-category-table', [
            'categories' => BlogCategory::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
