@extends('layouts.main')
@section('content')
<section class="h-fit">
  <div class="h-72 w-5/6 mx-auto mt-5">
    <img src="{{Storage::url($post->image)}}" alt="" class="object-cover w-full h-full">
  </div>
  <div class="pt-8 space-y-5 text-center">
    <h2 class="text-3xl font-bold tracking-wider">{{$post->title}}</h2>
    <p><span class="font-semibold">Published On</span> : {{date('d M Y', $post->date)}} | By <span class="font-semibold">{{$post->user->name}}</span></p>
  </div>
  <div class="w-5/6 mx-auto py-10">
    {!! nl2br($post->post) !!}
  </div>
</section>
@endsection