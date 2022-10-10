<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestArticles = Article::orderByDesc('created_at')->take(2)->get();
        $featuredArticles = Article::orderByDesc('created_at')->skip(2)->take(6)->get();
        $latestPost = Article::orderByDesc('created_at')->latest()->first();

        return view('home', compact('latestArticles', 'featuredArticles', 'latestPost'));
    }

    public function singlePost($title)
    {
        $postTitle = str_replace('-', ' ', $title);
        $post = Article::where('title' , $postTitle)->first();

        return view('single-post', compact('post'));
    }

}
