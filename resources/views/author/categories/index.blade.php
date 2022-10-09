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
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-t border-black text-black">
                    
                    <td class="py-4 px-6">
                        Sliver
                    </td>
                    <td class="py-4 px-6">
                        Sliver
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</section>
@endsection