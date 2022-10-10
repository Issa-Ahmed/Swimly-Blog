@extends('layouts.admin')
@section('content')
    <section class="ml-72 pt-12">
      <div class="py-4">
      <a href="{{route('dashboard.articles.index')}}" class="px-14 py-2 bg-sky-600 text-white font-bold rounded">Back</a>
    </div>
      <div class="h-64 w-4/5 mx-auto">
        <img src="{{Storage::url($article->image)}}" alt="" class="object-cover w-full h-full">
      </div>
      <div class="pl-5 pt-5">
        <p class="text-lg">Post By <span>{{$article->user->name}}</span> : <span class="opacity-50">{{date('d M Y',$article->date)}}</span></p>
        <h2 class="text-xl pt-2 leading-relaxed tracking-wide font-bold w-3/4">{{$article->title}}</h2>
      </div>
      <div class="px-5 pt-8">
        <article>{{$article->post}}</article>
      </div>
      <div class="pl-5 py-5 space-y-3">
        <p>Category: <span class="font-semibold">{{$article->category->title}}</span></p>
        <p>Tags:
          <ul>
            @foreach($article->tags as $tag)
            <li class="font-semibold">{{$tag->name}}</li>
            @endforeach
          </ul>
        </p>
      </div>
    </section>
@endsection