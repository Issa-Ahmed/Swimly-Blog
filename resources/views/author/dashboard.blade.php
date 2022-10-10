@extends('layouts.admin')
@section('content')
<section class="ml-72 h-full">
  <h2 class="text-5xl text-teal-400 font-semibold pt-12">Hello, {{auth()->user()->name}}</h2>
  <div class="w-full h-2/4 flex pt-7 space-x-5 pr-5">
    <div class="text-white text-2xl text-center font-bold rounded w-1/3 h-1/2 bg-sky-500">
      <h5 class="pt-5">Total Articles</h5>
      <p class="py-4">{{$articlesCount}}</p>
    </div>
   
    <div class="text-white text-2xl text-center font-bold rounded w-1/3 h-1/2 bg-teal-600">
      <h5 class="pt-5">Total Categories</h5>
      <p class="py-4">{{$categoriesCount}}</p>
    </div>
   
    <div class="text-white text-2xl text-center font-bold rounded w-1/3 h-1/2 bg-red-400">
      <h5 class="pt-5">Total Tags</h5>
      <p class="py-4">{{$tagCount}}</p>
    </div>
   
  </div>
</section>
@endsection