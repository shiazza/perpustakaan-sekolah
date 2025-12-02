<?php

namespace App\Http\Controllers\web\Master\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('master.category.index', compact('categories'));
    }

    public function create()
    {
        return view('master.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required|array',
            'names.*' => 'required|string|max:255',
        ]);

        foreach ($request->names as $name) {
            Category::create(['name' => $name]);
        }

        return redirect()->route('category.index')->with('success', 'Categories created successfully.');
    }

    public function show(Category $category)
    {
        return view('master.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('master.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
