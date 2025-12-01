<?php

namespace App\Http\Controllers\web\Master\Book;

use App\Http\Controllers\Controller;
use App\Models\BookParent;
use Illuminate\Http\Request;

class BooklistController extends Controller
{
    public function index()
    {
        $bookParents = BookParent::with('children')->paginate(10);

        // Calculate statistics
        $totalBooks = \App\Models\BookChild::count();
        $availableBooks = \App\Models\BookChild::where('status', 'available')->count();
        $borrowedBooks = \App\Models\BookChild::where('status', 'borrowed')->count();

        return view('master.booklist', compact('bookParents', 'totalBooks', 'availableBooks', 'borrowedBooks'));
    }
}
