<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookParent;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Buku Rekomendasi (Misal: Random 5 buku)
        $recommendedBooks = BookParent::with(['category', 'children'])
            ->inRandomOrder()
            ->limit(5)
            ->get();

        // 2. Kategori Buku
        $categories = Category::select('id_cate', 'name')->get();

        // 3. Buku Terbaru (Latest 5)
        $newestBooks = BookParent::with('category')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return response()->json([
            'message' => 'Data home berhasil diambil',
            'data' => [
                'recommendations' => $recommendedBooks,
                'categories' => $categories,
                'new_arrivals' => $newestBooks,
            ]
        ]);
    }
}