@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold mb-6">Category List</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-600">ID</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-600">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-700">{{ $category->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
