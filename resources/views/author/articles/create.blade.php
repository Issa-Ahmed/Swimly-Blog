@extends('layouts.admin')
@section('content')
<section class="ml-72 py-24 pl-10">
    @if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="font-bold text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="py-4">
      <a href="{{route('dashboard.articles.index')}}" class="px-14 py-2 bg-sky-600 text-white font-bold rounded">Back</a>
    </div>
    <form action="{{route('dashboard.articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="py-4">
          <label for="" class="block pb-2 text-lg">Post Title</label>
          <input type="text" class="w-64 h-8 rounded border border-gray-500 pl-3 text-lg" name="title"  value="{{ old('title') }}">
        </div> 
        <div class="py-4">
          <label for="" class="block pb-2 text-lg">Image</label>
          <input type="file" class="h-8 rounded border" name="image" value="{{ old('image') }}">
        </div>
        <div class="py-4">
          <label for="" class="block pb-2 text-lg">Post </label>
          <textarea name="post" class="resize-none w-5/6 h-96 border border-gray-500 px-5 py-2">{{old('post')}}</textarea>
        </div> 
        <div>
          <label for="" class="block pb-2 text-lg">Category</label>
          <select name="category_id" class="w-64 h-8 rounded border border-gray-500 pl-3 text-lg">
            <option selected disabled>Select Category</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
          </select>
        </div>
        <div class="mt-4">
          <h4 class="block pb-2 text-lg">Select Relevant Tags</h4>
          <div class="flex items-center space-x-2">
            @foreach($tags as $tag)
            <input type="checkbox" name="tag_id[]" class="w-5 h-5" value="{{$tag->id}}">
            <label class="pr-3">{{$tag->name}}</label>
            @endforeach
          </div>
        </div>

        <button type="submit" class="mt-5 px-12 rounded py-2 bg-green-500 font-bold text-white">Publish</button>
    </form>
</section>
@endsection