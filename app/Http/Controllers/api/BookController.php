<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BookParent;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // List Buku (Bisa filter by Category atau Search)
    public function index(Request $request)
    {
        $query = BookParent::with(['category', 'children']);

        // Search by Title / Writer
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('writers', 'like', "%{$search}%");
            });
        }

        // Filter by Category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->paginate(10); // Pagination

        return response()->json([
            'message' => 'List buku berhasil diambil',
            'data' => $books
        ]);
    }

    // Detail Buku
    public function show($id)
    {
        $book = BookParent::with(['category', 'children'])->find($id);

        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        // Cek Ketersediaan Stok (Dari BookChild)
        $availableStock = $book->children()->where('status', 'available')->count();

        return response()->json([
            'message' => 'Detail buku berhasil diambil',
            'data' => $book,
            'stock_available' => $availableStock
        ]);
    }
}