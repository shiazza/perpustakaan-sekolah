<?php

namespace App\Http\Controllers\web\Master\Book;

use App\Http\Controllers\Controller;
use App\Models\BookChild;
use App\Models\BookParent;
use Illuminate\Http\Request;

class BookChildController extends Controller
{
    public function index()
    {
        $bookChildren = BookChild::with('bookParent')->paginate(10);
        return view('master.book_child.index', compact('bookChildren'));
    }

    public function create()
    {
        $bookParents = BookParent::all();
        return view('master.book_child.create', compact('bookParents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bp_id' => 'required|exists:book_parents,id_bp',
            'ISBN' => 'required|string|max:255|unique:book_children,ISBN',
            'Condition' => 'required|string|max:255',
            'status' => 'required|in:available,borrowed,lost,damaged',
        ]);

        BookChild::create($request->all());

        return redirect()->route('book-child.index')->with('success', 'Book Child created successfully.');
    }

    public function show(BookChild $bookChild)
    {
        $bookChild->load('bookParent');
        return view('master.book_child.show', compact('bookChild'));
    }

    public function edit(BookChild $bookChild)
    {
        $bookParents = BookParent::all();
        return view('master.book_child.edit', compact('bookChild', 'bookParents'));
    }

    public function update(Request $request, BookChild $bookChild)
    {
        $request->validate([
            'bp_id' => 'required|exists:book_parents,id_bp',
            'ISBN' => 'required|string|max:255|unique:book_children,ISBN,' . $bookChild->id_bc . ',id_bc',
            'Condition' => 'required|string|max:255',
            'status' => 'required|in:available,borrowed,lost,damaged',
        ]);

        $bookChild->update($request->all());

        return redirect()->route('book-child.index')->with('success', 'Book Child updated successfully.');
    }

    public function destroy(BookChild $bookChild)
    {
        $bookChild->delete();

        return redirect()->route('book-child.index')->with('success', 'Book Child deleted successfully.');
    }
}
