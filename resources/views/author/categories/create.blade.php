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
      <a href="{{route('dashboard.categories.index')}}" class="px-14 py-2 bg-sky-600 text-white font-bold rounded">Back</a>
    </div>
    <form action="{{route('dashboard.categories.store')}}" method="POST">
        @csrf
        <div class="py-4">
          <label for="" class="block pb-2 text-lg">Category Title</label>
          <input type="text" class="w-64 h-8 rounded border border-gray-500 pl-3 text-lg" name="title"  value="{{ old('title') }}" required>
        </div> 
        <div class="py-4">
          <label for="" class="block pb-2 text-lg">Category Slug</label>
          <input type="text" class="w-64 h-8 rounded border border-gray-500 pl-3 text-lg" name="slug"  value="{{ old('slug') }}" required>
        </div>
        <button class="px-12 rounded py-2 bg-green-500 font-bold text-white">Create category</button>
    </form>
</section>
@endsection