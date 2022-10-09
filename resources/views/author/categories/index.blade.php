@extends('layouts.admin')
@section('content')
<section class="ml-72 h-full pt-24 pl-10">
    <div class="h-12 my-4">
        <a href="{{route('dashboard.categories.create')}}" class="px-12 rounded py-2 bg-green-500 font-bold text-white">Add new Category</a>
    </div>
    <x-session-messages></x-session-messages>  
    <div class="overflow-x-auto relative py-4">
        <table class=" w-2/3 text-sm text-left text-white">
            <thead class="text- text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Category name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date Created
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white border-t border-black text-black">
                    <td class="py-4 px-6">
                        {{$category->title}}
                    </td>
                    <td class="py-4 px-6">
                        {{date('d M Y',$category->date)}}
                    </td>
                    <td class="py-4 px-6 flex space-x-2">
                        <a href="{{route('dashboard.categories.edit', $category->id)}}" class="px-5 py-1 bg-sky-500 text-white rounded font-bold">Edit</a>
                        <form action="{{route('dashboard.categories.destroy', $category->id)}}" method="POST" onsubmit="return confirm('Are you sure to delete the category?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-5 py-1 bg-red-500 text-white rounded font-bold">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <div class="pt-5 pl-2 space-x-2">{{ $categories->links()}}</div>
    </div>

</section>
@endsection