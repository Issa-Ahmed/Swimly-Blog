@extends('layouts.main')
@section('content')
<section class="overlay bg-fixed h-[calc(100%_-_4rem)] bg-cover bg-center" style="background-image: url({{asset('img/swimming.jpg')}})">
<div class="ml-12 pt-32  h-full">
  <h1 class="mb-8 text-4xl text-white font-semibold leading-relaxed tracking-wide w-1/2">Training Hard When You’re Not Feeling Great Will Bring You To A New Level.</h1>
  <a href="{{route('single-post', $latestPost->title)}}" class="rounded px-12 py-3 bg-teal-500 text-white font-bold">Read the Latest Article</a>
</div>
</section>

<section class="h-full">
<div class="ml-10 pt-6">
  <h2 class="text-3xl text-teal-600">Latest Posts</h2>
  <div class="grid grid-cols-2 h-96 gap-x-10 mt-6 mr-6">

    @foreach ($latestArticles as $latestArticle)    
    <div class="relative flex justify-center overflow-hidden bg-green-200">
     <img class="object-cover w-full h-full hover:scale-110 duration-700 transition ease-in-out" src="{{Storage::url($latestArticle->image)}}" alt="">
      <div class="absolute -bottom-2 w-5/6 h-36 bg-gray-100 pl-4 pt-2">
        @php
         $title = Str::slug($latestArticle->title , '-');
        @endphp
        <a href="{{route('single-post',$title)}}" class="space-y-2">
        <h3 class="font-semibold text-teal-600">{{$latestArticle->category->title}}</h3>
        <p class="font-semibold">{{$latestArticle->title}}</p>
        <div>
          <span>{{$latestArticle->user->name}}</span>
          <span class="px-2"><svg class="h-2 w-2 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg></span>
          <span class="opacity-60">{{date('d M Y', $latestArticle->date)}}</span>
        </div>
        </a>
      </div>
    </div>
    @endforeach

  
  </div>
</div>
</section>

<section class="h-fit ml-5">
   <h2 class="text-3xl text-teal-600 pl-5 pb-2" id="articles">Featured Articles</h2>
 <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-5  pt-4 px-4">
  @foreach($featuredArticles as $featuredArticle)
  <div class="overlay relative flex flex-col justify-between bg-green-300 h-128 w-full overflow-hidden">
    <img class="w-full h-full object-cover hover:scale-110 duration-700 transition ease-in-out" src="{{Storage::url($featuredArticle->image)}}" alt="">
    <div class="pl-4 absolute bottom-5 text-white">
      <svg class="w-3 h-3 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
       @php
         $featured_title = Str::slug($featuredArticle->title , '-');
        @endphp
      <a href="{{route('single-post', $featured_title)}}" class="hover:text-sky-500 font-semibold transition">
        <span class="px-2">By {{$featuredArticle->user->name}}</span>
        <p class="mt-2 text-2xl font-semibold tracking-wide">{{$featuredArticle->title}}</p>
      </a>
    </div>
  </div>
  @endforeach
 </div>
</section>

@endsection