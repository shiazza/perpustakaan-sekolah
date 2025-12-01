@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Book List</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="bg-gradient-to-r from-orange-400 to-orange-500 text-white rounded-lg p-6 flex justify-between items-center shadow-md
                    transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:brightness-110">
            <span class="text-lg font-semibold">Total Book</span>
            <span class="text-xl font-bold">{{ $totalBooks }}</span>
        </div>

        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg p-6 flex justify-between items-center shadow-md
                    transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:brightness-110">
            <span class="text-lg font-semibold">Available Book</span>
            <span class="text-xl font-bold">{{ $availableBooks }}</span>
        </div>

        <div class="bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-lg p-6 flex justify-between items-center shadow-md
                    transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:brightness-110">
            <span class="text-lg font-semibold">Book Borrowed</span>
            <span class="text-xl font-bold">{{ $borrowedBooks }}</span>
        </div>
    </div>

    <hr class="my-4 border-gray-300">

    <div class="flex justify-end items-center mb-4">
        <div class="space-x-2 flex mb-4">
            <a href="{{ route('book-parent.index') }}" class="bg-[#FF4343] hover:bg-[#FF4343]/80 text-white font-bold py-2 px-4 rounded">
                Manage Book 
            </a>
            <a href="{{ route('book-child.index') }}" class="bg-[#FF9000] hover:bg-[#FF9000]/80 text-white font-bold py-2 px-4 rounded">
                Manage Book Copies
            </a>
        </div>
    </div>
    

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Writers</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publisher</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Available Copies</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($bookParents as $bookParent)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $bookParent->title }}</div>
                                <div class="text-sm text-gray-500">ID: {{ $bookParent->id_bp }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $bookParent->writers }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $bookParent->category->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $bookParent->publisher }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        @if($bookParent->image)
                            <img src="{{ asset('storage/' . $bookParent->image) }}" alt="Book Image" class="w-16 h-16 object-cover rounded">
                        @else
                            No image available
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $bookParent->children->where('status', 'available')->count() }} / {{ $bookParent->children->count() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $bookParents->links() }}
    </div>
</div>
@endsection
