<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{
    
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->paginate(5);
        return view('author.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.articles.create', compact('categories','tags'));
    }

    public function store(ArticleRequest $request)
    {
        
        $image = $request->file('image')->store('public/thumbnails');
        $article = Article::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'image'=>$image,
            'post'=>$request->post,
            'category_id'=>$request->category_id
        ]);

        $tag = Tag::find($request->tag_id);
        $article->tags()->attach($tag);

       return redirect('dashboard/articles')->with('message','Article has been published successfully');
    }

    public function show(Article $article)
    {
        return view('author.articles.show', compact('article'));
    }

   
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.articles.edit', compact('article','categories','tags'));
    }

   
    public function update(ArticleRequest $request, Article $article)
    {
        $image = $article->image;

        if(request()->hasFile('image')){
            Storage::delete($image);
            $image = $request->file('image')->store('public/thumbnails');
        }
        $article->update([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'image' => $image,
            'post' => $request->post,
            'category_id' => $request->category_id
        ]);

        $tag = Tag::find($request->tag_id);
        $article->tags()->sync($tag);

        return redirect('dashboard/articles')->with('message', 'Article has been updated successfully');

    }

   
    public function destroy(Article $article)
    {
        Storage::delete($article->image);
        $article->delete();

        return redirect('dashboard/articles')->with('message', 'Article has been deleted successfully');
    }
}
