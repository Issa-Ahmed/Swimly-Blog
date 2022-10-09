<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.articles.edit', compact('article','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
