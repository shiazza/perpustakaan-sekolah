<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BookParent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = BookParent::with('category')->get();

        return response()->json([
            'message' => 'Books retrieved successfully',
            'data' => $books,
        ]);
    }

    public function show($id)
    {
        $book = BookParent::with('category', 'children')->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json([
            'message' => 'Book details retrieved successfully',
            'data' => $book,
        ]);
    }
}
