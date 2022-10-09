<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderByDesc('created_at')->paginate(5);

        return view('author.tags.index' , compact('tags'));
    }

    public function create()
    {
        return view('author.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:tags'
        ]);

        Tag::create([
            'name'=> $request->name
        ]);

        return redirect('dashboard/tags')->with('message', 'Tag Created Successfully');
    }

   
    
    public function edit(Tag $tag)
    {
        return view('author.tags.edit' , compact('tag'));
    }

    
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $tag->update([
            'name' => $request->name
        ]);

        return redirect('dashboard/tags')->with('message', 'Tag Updated Successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        
        return redirect('dashboard/tags')->with('message', 'Tag Deleted Successfully');
    }
}
