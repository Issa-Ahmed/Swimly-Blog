@extends('layouts.admin')
@section('content')
<section class="ml-72 h-full pt-24 pl-10">
    <div class="h-12 my-4">
        <a href="{{route('dashboard.articles.create')}}" class="px-12 rounded py-2 bg-green-500 font-bold text-white">Publish new Article</a>
    </div>
    <x-session-messages></x-session-messages>  
    <div class="overflow-x-auto relative py-4">
        <table class="text-sm text-left text-white">
            <thead class=" text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        By
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Title
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Post
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Category
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tags
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr class="bg-white border-t border-black text-black">
                    <td class="py-4 px-6">
                        {{$article->user->name}}
                    </td>
                    <td class="py-4 px-6">
                        {{$article->title}}
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{route('dashboard.articles.show', $article->id)}}" class="hover:text-blue-400 hover:underline transition">
                            {{substr($article->post ,0, 100).'...'}}
                        </a>
                    </td>
                    
                    <td class="py-4 px-6">
                        {{$article->category->title}}
                    </td>
                    <td class="py-4 px-6">
                        @foreach($article->tags as $tag)
                        {{$tag->name}}
                        @endforeach
                    </td>
                    <td class="py-4 px-6">
                        {{date('d M Y',$article->date)}}
                    </td>
                    <td class="py-4 px-6 flex space-x-2">
                        <a href="{{route('dashboard.articles.edit', $article->id)}}" class="px-5 py-1 bg-sky-500 text-white rounded font-bold">Edit</a>
                        <form action="{{route('dashboard.articles.destroy', $article->id)}}" method="POST" onsubmit="return confirm('Are you sure to delete the article?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-5 py-1 bg-red-500 text-white rounded font-bold">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <div class="pt-5 pl-2 space-x-2">{{ $articles->links()}}</div>
    </div>

</section>
@endsection