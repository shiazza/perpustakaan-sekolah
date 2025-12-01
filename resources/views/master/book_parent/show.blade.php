@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Book Parent Details</h1>
            <div>
                <a href="{{ route('book-parent.edit', $bookParent) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('book-parent.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">{{ $bookParent->title }}</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Book Information</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ID</dt>
                                <dd class="text-sm text-gray-900">{{ $bookParent->id_bp }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Title</dt>
                                <dd class="text-sm text-gray-900">{{ $bookParent->title }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Writers</dt>
                                <dd class="text-sm text-gray-900">{{ $bookParent->writers }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Publisher</dt>
                                <dd class="text-sm text-gray-900">{{ $bookParent->publisher }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Category</dt>
                                <dd class="text-sm text-gray-900">{{ $bookParent->category->name ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Additional Information</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Sinopsis</dt>
                                <dd class="text-sm text-gray-900">{{ $bookParent->sinopsis ?? 'No sinopsis available' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Image</dt>
                                <dd class="text-sm text-gray-900">
                                    @if($bookParent->image)
                                        <img src="{{ asset('storage/' . $bookParent->image) }}" alt="Book Image" class="w-32 h-32 object-cover rounded">
                                    @else
                                        No image available
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Book Children ({{ $bookParent->children->count() }})</h3>
                    @if($bookParent->children->count() > 0)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($bookParent->children as $child)
                                <div class="bg-white p-4 rounded shadow">
                                    <h4 class="font-medium text-gray-900">ISBN: {{ $child->ISBN }}</h4>
                                    <p class="text-sm text-gray-600">Condition: {{ $child->Condition }}</p>
                                    <p class="text-sm text-gray-600">Status: {{ $child->status }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500">No book children found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
