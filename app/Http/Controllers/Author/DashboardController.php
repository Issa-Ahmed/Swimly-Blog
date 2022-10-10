<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Tag;

class DashboardController extends Controller
{
    public function index()
    {
      $tagCount = Tag::all()->count();
      $articlesCount = Article::all()->count();
      $categoriesCount = Category::all()->count();
      return view('author.dashboard', compact('tagCount','articlesCount','categoriesCount'));
    }
}
