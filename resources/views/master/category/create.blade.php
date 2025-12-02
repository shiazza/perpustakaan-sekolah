@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Add New Categories</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('category.store') }}" method="POST" id="categoryForm">
            @csrf

            <div id="categoryInputs">
                <div class="mb-4 category-input">
                    <label for="names[]" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" name="names[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
            </div>

            <div class="mb-4">
                <button type="button" id="addCategory" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Another Category</button>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('category.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Categories</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('addCategory').addEventListener('click', function() {
    const container = document.getElementById('categoryInputs');
    const newInput = document.createElement('div');
    newInput.className = 'mb-4 category-input';
    newInput.innerHTML = `
        <label for="names[]" class="block text-sm font-medium text-gray-700">Category Name</label>
        <div class="flex">
            <input type="text" name="names[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            <button type="button" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded remove-category">Remove</button>
        </div>
    `;
    container.appendChild(newInput);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-category')) {
        e.target.closest('.category-input').remove();
    }
});
</script>
@endsection
