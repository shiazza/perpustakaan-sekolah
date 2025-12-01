@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Create Book Child</h1>
            <a href="{{ route('book-child.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Add New Book Child</h2>
            </div>
            <div class="p-6">
                <form action="{{ route('book-child.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="bp_id" class="block text-sm font-medium text-gray-700">Book Parent</label>
                        <select id="bp_id" name="bp_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="">Select a Book Parent</option>
                            @foreach($bookParents as $bookParent)
                            <option value="{{ $bookParent->id_bp }}">
                                {{ $bookParent->title }} ({{ $bookParent->writers }})
                            </option>
                            @endforeach
                        </select>
                        @error('bp_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="ISBN" class="block text-sm font-medium text-gray-700">ISBN</label>
                        <input type="text" id="ISBN" name="ISBN" value="{{ old('ISBN') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('ISBN')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Condition" class="block text-sm font-medium text-gray-700">Condition</label>
                        <input type="text" id="Condition" name="Condition" value="{{ old('Condition') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                        @error('Condition')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="borrowed" {{ old('status') == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                            <option value="lost" {{ old('status') == 'lost' ? 'selected' : '' }}>Lost</option>
                            <option value="damaged" {{ old('status') == 'damaged' ? 'selected' : '' }}>Damaged</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Book Child
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
