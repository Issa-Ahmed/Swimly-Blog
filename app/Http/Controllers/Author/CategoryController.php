<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->paginate(5);
        return view('author.categories.index', compact('categories'));

    }

    public function create()
    {
        return view('author.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $slug = Str::slug($request->validated('slug'));
        Category::create([
            'title'=>$request->validated('title'),
            'slug'=>$slug
        ]);

        return redirect('dashboard/categories')->with('message', 'Category Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('author.categories.edit', compact('category'));
    }

   
    public function update(CategoryRequest $request, Category $category)
    {
        $slug = Str::slug($request->validated('slug'));
        $category->update([
            'title' => $request->validated('title'),
            'slug' => $slug
        ]);

        return redirect('dashboard/categories')->with('message', 'Category Updated Successfully');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect('dashboard/categories')->with('message', 'Category Deleted Successfully');
    }
}
