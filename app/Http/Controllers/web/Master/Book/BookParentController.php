<?php

namespace App\Http\Controllers\web\Master\Book;

use App\Http\Controllers\Controller;
use App\Models\BookParent;
use App\Models\Category;
use Illuminate\Http\Request;

class BookParentController extends Controller
{
    public function index()
    {
        $bookParents = BookParent::with('category')->paginate(10);
        return view('master.book_parent.index', compact('bookParents'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('master.book_parent.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'writers' => 'required|string|max:255',
            'sinopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id_cate',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publisher' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('book_images', 'public');
        }

        BookParent::create($data);

        return redirect()->route('book-parent.index')->with('success', 'Book Parent created successfully.');
    }

    public function show(BookParent $bookParent)
    {
        $bookParent->load('category', 'children');
        return view('master.book_parent.show', compact('bookParent'));
    }

    public function edit(BookParent $bookParent)
    {
        $categories = Category::all();
        return view('master.book_parent.edit', compact('bookParent', 'categories'));
    }

    public function update(Request $request, BookParent $bookParent)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'writers' => 'required|string|max:255',
            'sinopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id_cate',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publisher' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('book_images', 'public');
        }

        $bookParent->update($data);

        return redirect()->route('book-parent.index')->with('success', 'Book Parent updated successfully.');
    }

    public function destroy(BookParent $bookParent)
    {
        $bookParent->delete();

        return redirect()->route('book-parent.index')->with('success', 'Book Parent deleted successfully.');
    }
}
