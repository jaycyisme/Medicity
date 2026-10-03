<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blogcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
            'description' => 'nullable|string',
        ]);

        $blog_category = new BlogCategory();
        $blog_category->name = $request->name;
        $blog_category->description = $request->description;

        $blog_category->save();
        return redirect()->route('blogcategory.index')->with('success', 'Blog Category is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        return view('admin.blogcategory.show', compact('blog_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        return view('admin.blogcategory.edit', compact('blog_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->name = $request->name;
        $blog_category->description = $request->description;

        $blog_category->save();
        return redirect()->route('blogcategory.index')->with('success', 'Blog Category is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->delete();
        return redirect()->route('blogcategory.index')->with('success','Blog Category is deleted');
    }
}
